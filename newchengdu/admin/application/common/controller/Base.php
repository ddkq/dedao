<?php
namespace app\common\controller;
use think\Controller;
use think\Request;
use think\Response;
use redis\Redis;
use think\Validate;
use think\Config;
use think\Db;
use think\exception\HttpResponseException;

/**
* 构造模型
*/
class Base extends Controller{

    protected static $db_id;

	/**
     * 构造函数
     * @param Request $request Request对象
     * @access public
     */
    public function __construct(Request $request = null){

        Redis::open();

        if (is_null($request)) {
            $request = Request::instance();
        }

        $this->request = $request;

        // 控制器初始化
        $this->initialize();
    }

    public function initialize(){
        self::$db_id = cmf_get_current_db_id();
    }

    /**
     * 返回封装后的 API 信息到客户端
     * @access protected
     * @param int    $code   返回的 code
     * @param mixed  $msg    提示信息
     * @param string $type   返回数据格式
     * @param array  $header 发送的 Header 信息
     * @return void
     * @throws HttpResponseException
     */
    protected function info($code = 0, $msg = '', $type = '', array $header = []){
        //结果数组
        $result = [
            'code' => $code,
            'info'  => $msg,
            'time' => Request::instance()->server('REQUEST_TIME'),
        ];
        $type     = $type ?: $this->getResponseType();
        $response = Response::create($result, $type)->header($header);

        throw new HttpResponseException($response);
    }

    /**
     *  排序 排序字段为list_orders数组 POST 排序字段为：list_order
     */
    protected function listOrders($model){
        if (!is_object($model)) {
            return false;
        }
        //获取主键名称
        $pk  = $model->getPk(); 
        //原始数组
        $original_list_order = $this->request->post("original_list_order/a");
        //改动后的数组
        $list_order = $this->request->post("list_order/a");
        $ids = array_diff_list_orders($original_list_order,$list_order);
        if (!empty($ids)) {
            foreach ($ids as $key => $r) {
                $data['list_order'] = $r['list_order'];
                $model->where([$pk => $r['id']])->update($data);
            }
            return true;
        }else{
            return false;
        }
        
    }

    /**
     * 上传缩略图(base64)
     * @param base64 $file 缩略图文件
     * @param int $db_id 数据库id
     * @return json 图片地址
     */
    protected function upload_thumb($file, $db_id = 1){

        //生成上传目录
        $up_dir = '../public/uploads/'.date('Ymd').'/';
        if (!file_exists($up_dir)){
            mkdir ($up_dir,0777,true);
        }

        //读取配置，获取上传限制
        $setting = cmf_get_option('upload_info',$db_id);
        $validate = ['size'=>intval($setting['image_max_filesize']),'ext'=>$setting['image_extensions']];
        $base64_img = trim($file);
        //判断是否base64格式
        if(preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_img, $result)){
            //限制大小
            $base64 = str_replace($result[1], '' ,$base64_img);
            $base64 = str_replace('=', '',$base64);
            $img_len = strlen($base64);
            $file_size = intval($img_len) - (intval($img_len)/8)*2;
            //dump((intval($file_size)/1024)*1024);exit;
            $file_size = intval($file_size)/1024;
            //dump($file_size);exit;
            if($file_size > $validate['size']){
                $this->info(0,'图片大小超过了后台限制');
            }
            //判断文件类型
            if(in_array($result[2],explode(',',$validate['ext']))){
                //创建文件
                $new_file = $up_dir.md5(microtime().mt_rand(10,100)).'.'.$result[2];
                //移动文件
                if(file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_img)))){
                    //返回文件路径
                    $img_path = 'http://img.dedaokq.com'.str_replace('../public','', $new_file);
                    return $img_path;
                }else{
                    $this->info(0,'图片上传失败');
                }
            }else{
                //文件类型错误
                $this->info(0,'图片上传类型错误');
            }
        }else{
            $this->info(0,'非法文件');
        }
    }

    /**
     * 上传多张图片
     * @param  array $file base64图片集合
     * @param  int $db_id 数据库id
     * @return array 图片路径集合
     */
    protected function uploadImgMulit($file, $db_id = 1){

        $returnArr = [];

        //生成上传目录
        $up_dir = '../public/uploads/'.date('Ymd').'/';
        if (!file_exists($up_dir)){
            mkdir ($up_dir,0777,true);
        }

        //读取配置，获取上传限制
        $setting = cmf_get_option('upload_info',$db_id);
        $validate = ['size'=>intval($setting['image_max_filesize']),'ext'=>$setting['image_extensions']];
        foreach ($file as $key => $value) {
            $base64_img = trim($value);
            //判断是否base64格式
            if(preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_img, $result)){
                //限制大小
                $base64 = str_replace($result[1], '' ,$base64_img);
                $base64 = str_replace('=', '',$base64);
                $img_len = strlen($base64);
                $file_size = $img_len - ($img_len/8)*2;
                $file_size = number_format(($file_size/1024),2)*1024;
                if($file_size > $validate['size']){
                    $this->info(0,'图片大小超过了后台限制');
                }
                //判断文件类型
                if(in_array($result[2],explode(',',$validate['ext']))){
                    //创建文件
                    $new_file = $up_dir.md5(microtime().mt_rand(10,100)).'.'.$result[2];
                    //移动文件
                    if(file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_img)))){
                        //返回文件路径
                        $img_path = str_replace('../public','', $new_file);
                        $returnArr[$key] = $img_path;
                    }else{
                        $this->info(0,'图片上传失败');
                    }
                }else{
                    //文件类型错误
                    $this->info(0,'图片上传类型错误');
                }
            }else{
                $this->info(0,'非法文件');
            }    
        }

        return $returnArr;
        
    }

    //删除图片
    protected function deleteImage($model){
        if (!is_object($model)) {
            return false;
        }
        //获取主键名称
        $pk  = $model->getPk(); 
        $id = $this->request->param($pk);
        $image = $model->where($pk,$id)->value('image');
        if(!empty($image)){
            return destory_file($image);
        }
    }

    //检查子类
    protected function checkCategoryChildren($model){
        if(!is_object($model)){
            return false;
        }
        $id = $this->request->param("id");
        $count = $model->where('parent_id',$id)->count();
        if($count > 0){
            $this->info(0,'该菜单下还有子类不能删除！');
        }
    }



    /**
     * 上传文件(保留用)
     * @return json 图片地址
     */
    protected function upload(){

        //生成上传目录
        /*$up_dir = '../public/uploads/'.date('Ymd').'/';
        if (!file_exists($up_dir)){
            mkdir ($up_dir,0777,true);
        }*/

        $file = $this->request->file();
        $type = $this->request->param('type');
        $mulit = $this->request->param('mulit',0,'intval');

        //读取配置，获取上传限制
        $setting = cmf_get_option('upload_info');
        if($type == 1){
            //图片
            $validate = ['size'=>intval($setting['image_max_filesize']),'ext'=>$setting['image_extensions']];
        }elseif($type == 2){
            //视频
            $validate = ['size'=>intval($setting['video_max_filesize']),'ext'=>$setting['video_extensions']];
        }elseif($type == 3){
            //音频
            $validate = ['size'=>intval($setting['audio_max_filesize']),'ext'=>$setting['audio_extensions']];
        }elseif($type == 4){
            //文件
            $validate = ['size'=>intval($setting['file_max_filesize']),'ext'=>$setting['file_extensions']];
        }

        $returnArray = [];
        if($file){
            foreach ($file as $value) {
                $i = 0;
                $info = $value->validate($validate)->rule('data')->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    $returnArray[$i] = '/uploads/'.$info->getSaveName();
                    $i++;
                }else{
                    $this->info(0,$file->getError());
                }
            }
        }else{
            $this->info(0,'非法文件');
        }
        return $returnArray;
    }
}