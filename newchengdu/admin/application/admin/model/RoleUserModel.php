<?php
namespace app\admin\model;
use think\Model;

class RoleUserModel extends Model{

    protected $table = 'cmf_role_user';
    protected $autoWriteTimestamp = false;

    public function user(){
        return $this->belongsTo('UserModel');
    }

}