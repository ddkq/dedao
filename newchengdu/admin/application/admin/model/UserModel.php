<?php
namespace app\admin\model;
use app\common\model\BaseModel;

/**
 * 管理员模型
 */
class UserModel extends BaseModel{

    protected $table = 'cmf_user';
    protected $autoWriteTimestamp = false;

    public function role(){
        return $this->hasOne('RoleUserModel','user_id','id');
    }

    //获取管理员类别
    public function getUsers(){
        $users = $this->alias('a')->join('cmf_role_user r','a.id = r.user_id')->where('user_type',1)->field('a.id,user_login,last_login_time,last_login_ip,user_status,r.role_id')->select();
        return $users;
    }
    

}