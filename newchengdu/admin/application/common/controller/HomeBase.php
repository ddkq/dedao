<?php
namespace app\common\controller;
use think\Controller;
use think\Request;
use think\Response;
use think\exception\HttpResponseException;

/**
* 前端控制器
*/
class HomeBase extends Controller{

    protected static $db_id;
	
	/**
     * 构造函数
     * @param Request $request Request对象
     * @access public
     */
    public function __construct(Request $request = null){

        if (is_null($request)) {
            $request = Request::instance();
        }

        $this->request = $request;

        // 控制器初始化
        $this->initialize();

    }

    public function initialize(){
        self::$db_id = $this->request->param('db_id');
        if(empty(self::$db_id)){
            echo json_encode(['code'=>0,'info'=>'非法操作']);
            exit;
        }
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

}