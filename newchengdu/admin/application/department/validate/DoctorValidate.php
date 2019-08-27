<?php
namespace app\department\validate;
use think\Validate;
use think\Db;

/**
 * 后台医生验证器
 */
class DoctorValidate extends Validate{
    protected $rule = [
        'doctor_name'               => 'require',
        'department_id'             => 'require',
        'doctor_introduction'       => 'require',
        'doctor_proficient'         => 'require',
    ];

    protected $message = [
        'doctor_name.require'                  => '医生名不能为空',
        'department_id.require'                => '请选择科室',
        'doctor_introduction.require'          => '医生介绍不能为空',
        'doctor_proficient.require'            => '医生擅长项目不能为空',
    ];

}