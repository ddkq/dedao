<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Config;
use think\Db;
use think\Url;
use dir\Dir;
use think\Route;
use think\Loader;
use think\Request;
use Local\local;
use auth\Auth;
use redis\Redis;

/**
 * 获取当前登录的管理员ID
 * @param int $db_id 数据库id
 * @return int
 */
function cmf_get_current_admin_id(){
    //默认值
    $session_admin_id = 0;
    //获取用户token，根据token获取db_id
    $token = Request::instance()->param('token');
    $user_id = Redis::get($token);
    $db_id = Redis::get('ADMIN_ID_'.$user_id.'_DB');
    if(!empty($db_id)){
        //判断token是否过期
        $expire_time = Db::connect('db_config'.$db_id)->name('UserToken')->where('user_id',$user_id)->value('expire_time');
        if($expire_time < time()){
            $session_admin_id = 0;
        }else{
            $session_admin_id = $user_id;
        }
    }
    
    return $session_admin_id;
}

/**
 * 获取当前登录的数据库
 * @return string 数据库名
 */
function cmf_get_current_db_id(){
    $session_admin_id = cmf_get_current_admin_id();
    $db_id = Redis::get('ADMIN_ID_'.$session_admin_id.'_DB');
    if(empty($db_id)){
        $db_id = 1;
    }
    return $db_id;
}

/**
 * 获取当前数据库id
 * @return string 数据库配置名称
 */
function cmf_get_model_db_id(){
    $param_db_id = Request::instance()->param('db_id');
    if(!empty($param_db_id)){
        //前端api传值获取db_id
        $db_id = $param_db_id;
    }else{
        //后台根据登录信息获取db_id
        $db_id = cmf_get_current_db_id();
    }
    //根据数据库id连接数据库
    if($db_id == 1){
        $connection = 'db_config1';
    }elseif($db_id == 2){
        $connection = 'db_config2';
    }
    return $connection;
}


/**
 * 检查权限
 * @param int $userId          要检查权限的用户 ID
 * @param string|array $name   需要验证的规则列表,支持逗号分隔的权限规则或索引数组
 * @param string $relation     如果为 'or' 表示满足任一条规则即通过验证;如果为 'and'则表示需满足所有规则才能通过验证
 * @param int $db_id           数据库id
 * @return boolean             通过验证返回true;失败返回false
 */
function cmf_auth_check($userId, $name = null, $relation = 'or', $db_id = 1){
    if (empty($userId)) {
        return false;
    }

    if ($userId == 1) {
        return true;
    }

    $authObj = new Auth();
    if (empty($name)) {
        $request    = request();
        $module     = $request->module();
        $controller = $request->controller();
        $action     = $request->action();
        $name       = strtolower($module . "/" . $controller . "/" . $action);
    }
    return $authObj->check($userId, $name, $relation, $db_id);
}



/**
 * 获取网站配置
 * @param string $key 配置名
 * @param int $db_id 数据库id
 * @return array      具体配置信息
 */
function cmf_get_option($key, $db_id = 1){

    if(!is_string($key) || empty($key)){
        return [];
    }

    $option = cache('cmf_options_' . $key.'_by_'.$db_id);
    if(empty($option)){
        $option = Db::connect('db_config'.$db_id)->name('option')->where('option_name',$key)->value('option_value');

        if(!empty($option)){
            $option = json_decode($option,true);
            cache('cmf_options_'.$key.'_by_'.$db_id,$option);
        }
    }
    return $option;
}

/**
 * 密码加密
 * @param  string $password 需要加密的密码字符串
 * @return string           加密后的密码
 */
function cmf_password($password){
    $result = '###' . md5(md5($password));
    return $result;
}

/**
 * 比较前后密码是否一致
 * @param  string $password     需要比较的密码
 * @param  string $passwordInDb 数据库存放的密码
 * @return Boolean               
 */
function cmf_compare_password($password,$passwordInDb){
    if(cmf_password($password) == $passwordInDb){
        return true;
    }else{
        return false;
    }
}

/**
 * 发送邮件
 * @param string $address 收件人邮箱
 * @param string $subject 邮件标题
 * @param string $message 邮件内容
 * @param int $db_id 数据库id
 * @return json
 */
function cmf_send_email($address, $subject, $message, $db_id = 1){
    vendor('PHPMailer.PHPMailerAutoload');
    $smtpSetting = cmf_get_option('smtp_setting', $db_id);

    // 实例化PHPMailer核心类
    $mail = new \PHPMailer();
    // 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    $mail->SMTPDebug = 1;
    // 使用smtp鉴权方式发送邮件
    $mail->isSMTP();
    // smtp需要鉴权 这个必须是true
    $mail->SMTPAuth = true;
    // 设置服务器地址
    $mail->Host = $smtpSetting['host'];
    // 设置使用ssl加密方式登录鉴权
    $mail->SMTPSecure = $smtpSetting['host'] ? $smtpSetting['host'] : 'ssl';
    // 设置ssl连接smtp服务器的远程服务器端口号
    $mail->Port = $smtpSetting['port'];
    // 设置发送的邮件的编码
    $mail->CharSet = 'UTF-8';
    // 设置发件人昵称 显示在收件人邮件的发件人邮箱地址前的发件人姓名
    $mail->FromName = $smtpSetting['from_name'];
    // smtp登录的账号 邮箱地址即可
    $mail->Username = $smtpSetting['username'];
    // smtp登录的密码 使用生成的授权码
    $mail->Password = $smtpSetting['password'];
    // 设置发件人邮箱地址 同登录账号
    $mail->From = $smtpSetting['from'];
    // 邮件正文是否为html编码 注意此处是一个方法
    $mail->isHTML(true);
    // 设置收件人邮箱地址
    $mail->addAddress($address);
    // 添加多个收件人 则多次调用方法即可
    //$mail->addAddress($address);
    // 添加该邮件的主题
    $mail->Subject = $subject;
    // 添加邮件正文
    $mail->Body = $message;
    // 为该邮件添加附件
    //$mail->addAttachment('./example.pdf');

    // 发送邮件。
    //dump($mail);
    if (!$mail->send()) {
        $mailError = $mail->ErrorInfo;
        return ["code" => 0, "info" => $mailError];
    } else {
        return ["code" => 1, "info" => "success"];
    }
}


/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
 * @return string
 */
function get_client_ip($type = 0, $adv = false){
    return request()->ip($type, $adv);
}



/**
 * 删除文件
 * @param  string $file 文件路径
 * @return boolean
 */
function destory_file($file){
    if(empty($file)){
        return false;
    }
    $file = '../public'.substr($file,22);
    if(file_exists($file)){
        chmod($file,0777);
        if(unlink($file)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
    
}

/**
 * 获取排序数组差值
 * @param  array $array1 原数组
 * @param  array $array2 改动后的数组
 * @return array         差值
 */
function array_diff_list_orders($array1,$array2){
    $result = [];
    foreach ((array)$array1 as $k => $v) {
        if (!isset($array2[$k])) {
            $result[$k] = $v;
        }elseif((is_array($v) && is_array($array2[$k])) && ($v['id'] == $array2[$k]['id']) && ($v['list_order'] != $array2[$k]['list_order']) ){
            $result[$k] = $array2[$k];
        }elseif($v != $array2[$k]){
            $result[$k] = $array2;
        }
    }
    return $result;
}

/**
 * 获取模板列表
 * @param int $db_id 数据库id
 * @return array 列表数据
 */
function cmf_get_theme($db_id){
    $result = Db::connect('db_config'.$db_id)->name('Theme')->select();
    return $result;
}
