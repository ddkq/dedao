<?php
namespace app\encyclopedia\controller;
use app\common\controller\AdminBase;
use app\encyclopedia\model\EncyclopediaModel;
use app\encyclopedia\validate\EncyclopediaValidate;
use think\Db;


/**
* 后台百科类
*/
class AdminEncyclopedia extends AdminBase{
	
	protected $encyclopediaModel;
	
	public function initialize(){
        parent::initialize(); 
        $this->encyclopediaModel = new EncyclopediaModel();
    }

    /**
     * 百科列表
     * @return json
     */
	public function index(){
		$param = $this->request->param();
		$result = $this->encyclopediaModel->EncyclopediaList($param);
		return json($result);
	}

	/**
	 * 添加百科
	 */
	public function addPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data,'EncyclopediaValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$data = $this->dataProcessing($data);
			$result1 = $this->encyclopediaModel->EncyclopediaAddPost($data);
			if($result1){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}	
		}
	}

	/**
	 * 修改百科
	 * @return json
	 */
	public function editPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data,'EncyclopediaValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$data = $this->dataProcessing($data);
			$result1 = $this->encyclopediaModel->EncyclopediaEditPost($data);
			if($result1){
				$this->info(1,'修改成功');
			}else{
				$this->info(0,'修改失败');
			}	
		}
	}

	/**
	 * 删除百科
	 * @return json
	 */
	public function delete(){

		$param = $this->request->param();

		//单一文章
		if(isset($param['id'])){
			$id = $param['id'];
			$result = $this->encyclopediaModel->allowField(true)->isUpdate(true)->save(['delete_time'=>time()],['id'=>$id]);
			if($result){
				Db::connect('db_config'.parent::$db_id)->name('enRelationships')->where('en_id',$id)->setField('status',0);
				$user_id = cmf_get_current_admin_id();
				$name = $this->encyclopediaModel->where('id',$id)->value('en_title');
				$data = [
					'object_id'		=>	$id,
					'create_time'	=>	time(),
					'table_name'	=>	'encyclopedia',
					'name'			=>	$name,
					'user_id'		=>	$user_id
				];
				Db::name('RecycleBin')->insert($data);
			}
		}
		//批量删除
		if(isset($param['ids'])){
			$ids = $param['ids'];
			$recycle = $this->encyclopediaModel->where(['id' => ['in', $ids]])->select();
			$result = $this->encyclopediaModel->where(['id' => ['in', $ids]])->update(['delete_time'=>time()]);
			if($result){
				Db::connect('db_config'.parent::$db_id)->name('enRelationships')->where(['en_id' => ['in', $ids]])->setField('status',0);
				$user_id = cmf_get_current_admin_id();
				foreach ($recycle as $key => $value) {
					$name = $value['en_title'];
					$data = [
						'object_id'		=>	$value['id'],
						'create_time'	=>	time(),
						'table_name'	=>	'encyclopedia',
						'name'			=>	$name,
						'user_id'		=>	$user_id
					];
					Db::name('RecycleBin')->insert($data);
				}
			}
		}
		$this->info(1,'删除成功');
	}

	/**
	 * 修改百科属性
	 * @return json
	 */
	public function transform(){

		$param = $this->request->param();

		if(isset($param['id'])){
			$id = $param['id'];
			if(isset($param['status']) && $param['status'] !== ''){
				$this->encyclopediaModel->where('id',$id)->update(['status'=>$param['status']]);
			}
			if(isset($param['top']) && $param['top'] !== ''){
				$this->encyclopediaModel->where('id',$id)->update(['is_top'=>$param['top']]);
			}
			if(isset($param['recommended']) && $param['recommended'] !== ''){
				$this->encyclopediaModel->where('id',$id)->update(['recommended'=>$param['recommended']]);
			}
		}

		if(isset($param['ids'])){
			$ids = $param['ids'];
			if(isset($param['status']) && $param['status'] !== ''){
				$this->encyclopediaModel->where(['id' => ['in', $ids]])->update(['status'=>$param['status']]);
			}
			if(isset($param['top']) && $param['top'] !== ''){
				$this->encyclopediaModel->where(['id' => ['in', $ids]])->update(['is_top'=>$param['top']]);
			}
			if(isset($param['recommended']) && $param['recommended'] !== ''){
				$this->encyclopediaModel->where(['id' => ['in', $ids]])->update(['recommended'=>$param['recommended']]);
			}
		}
		$this->info(1,'修改成功');

	}

	/**
	 * 排序
	 * @return json
	 */
	public function list_orders(){
        $result = parent::listOrders(Db::name('enRelationships'));
        if($result){
            $this->info(1,'排序成功');
        }else{
            $this->info(0,'排序失败');
        }
    }


    //处理post图片数据
    private function dataProcessing($data){
    	//缩略图
    	if(!empty($data['thumb'])){
    		$image = $data['thumb'];
    		if(!empty($data['id'])){
    			$orginal_thumb = $this->encyclopediaModel->where('id',$data['id'])->value('thumb');
    			if($orginal_thumb !== $image){
    				$upload = $this->upload_thumb($image);
					if($upload){
						$data['thumb'] = $upload;
					}else{
						$this->info(0,'上传图片失败');
					}
    			}
    		}else{
    			$upload = $this->upload_thumb($image);
				if($upload){
					$data['thumb'] = $upload;
				}else{
					$this->info(0,'上传图片失败');
				}
    		}
		}
		//内容的图片
		if(!empty($data['en_step'])){
			$data['en_step'] = json_encode($data['en_step']);
			ini_set('pcre.backtrack_limit', 999999999);
	    	$preg = "|(src=\x22)+[A-Za-z0-9]+[^%&'?$\x22]+|";
	    	$data['en_step'] = preg_replace_callback(
		        $preg,
		        function ($matches) {
				    return 'src="'.$this->upload_thumb(substr($matches[0],5));
		        },
		        $data['en_step']
		    );
		}
		return $data;
    }
	
}