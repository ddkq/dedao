<?php
namespace app\admin\model;
use app\common\model\BaseModel;

/**
* 导航模型类
*/
class NavModel extends BaseModel{
	
	protected $table = 'cmf_nav';

	protected static function init(){
        //写入path路径
        NavModel::event('after_write',function($nav){
            if($nav->parent_id == 0){
                $path = $nav->id;
            }else{
                $path = NavModel::where('id',$nav->parent_id)->value('path');
                $path = $path.','.$nav->id;
            }
            NavModel::where('id',$nav->id)->update(['path'=>$path]);
        });
    }
}