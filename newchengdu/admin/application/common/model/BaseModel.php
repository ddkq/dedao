<?php
namespace app\common\model;
use think\Model;
use think\Request;


/**
* 公共模型
*/
class BaseModel extends Model{

	//数据库id
	protected static $db_id;

    //protected $connection = 'db_config1';

	protected function initialize(){
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        
        $param_db_id = Request::instance()->param('db_id');
        if(!empty($param_db_id)){
        	//前端api传值获取db_id
        	self::$db_id = $param_db_id;
        }else{
        	//后台根据登录信息获取db_id
        	self::$db_id = cmf_get_current_db_id();
        }
        //根据数据库id连接数据库
	    if(self::$db_id == 1){
	    	$this->connection = 'db_config1';
	    }elseif(self::$db_id == 2){
	    	$this->connection = 'db_config2';
	    }
    }


}