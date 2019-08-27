<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;
use think\Cache;

/**
 * 后台配置
 */
class Setting extends AdminBase{

	/**
	@SWG\Post(
        path = "/admin/Setting/site",
        summary = "网站信息",
        description = "网站信息",
        tags = {"Admin/Route(后台/网站配置)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "name",
        	type = "string",
        	in = "formData",
        	description = 	"
        					配置名
							site_info: 网站基本信息
							user_info: 网站用户注册配置信息
							comment_info: 网站评论配置信息
							upload_info: 网站上传设置信息
							返回格式与字段说明看下面相对应的保存接口
							"
        ),
        @SWG\Response(
            response = "200",
            description = "网站信息",
            @SWG\Schema(
                required = {"site"},
                type = "array",
                @SWG\Items(),
            ),
        ),
    ),
    */
	public function site(){
		$name = $this->request->param('name','');
		$info = cmf_get_option($name, parent::$db_id);
		return json($info);

	}

	/**
	@SWG\Post(
        path = "/admin/Setting/sitePost",
        summary = "保存网站基本信息",
        description = "保存网站基本信息",
        tags = {"Admin/Route(后台/网站配置)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "site_name",
        	type = "string",
        	in = "formData",
        	description = "网站标题",
        ),
        @SWG\Parameter(
        	name = "site_seo_title",
        	type = "string",
        	in = "formData",
        	description = "seo标题",
        ),
        @SWG\Parameter(
        	name = "site_seo_keywords",
        	type = "string",
        	in = "formData",
        	description = "seo关键词",
        ),
        @SWG\Parameter(
        	name = "site_seo_description",
        	type = "string",
        	in = "formData",
        	description = "seo描述",
        ),
        @SWG\Parameter(
        	name = "site_icp",
        	type = "string",
        	in = "formData",
        	description = "ICP备案号",
        ),
        @SWG\Parameter(
        	name = "site_gov",
        	type = "string",
        	in = "formData",
        	description = "公安备案号",
        ),
        @SWG\Parameter(
        	name = "site_adv",
        	type = "string",
        	in = "formData",
        	description = "广审号",
        ),
        @SWG\Parameter(
        	name = "site_admin_email",
        	type = "string",
        	in = "formData",
        	description = "站长邮箱",
        ),
        @SWG\Parameter(
        	name = "site_analytics",
        	type = "string",
        	in = "formData",
        	description = "统计代码",
        ),
        @SWG\Parameter(
        	name = "site_telephone",
        	type = "string",
        	in = "formData",
        	description = "网站电话",
        ),@SWG\Parameter(
        	name = "site_address",
        	type = "string",
        	in = "formData",
        	description = "网站地址",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function sitePost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			if(empty($data['site_name'])){
				$this->info(0,'网站标题不能为空');
			}
			unset($data['token']);
			$result = Db::connect('db_config'.parent::$db_id)->name('option')->where('option_name','site_info')->setField('option_value',json_encode($data));
			if($result){
				cache('cmf_options_site_info_by_'.parent::$db_id,null);
				$this->info(1,'保存成功');
			}else{
				$this->info(0,'保存失败');
			}
		}
	}


	/**
	@SWG\Post(
        path = "/admin/Setting/userPost",
        summary = "保存网站用户注册配置信息",
        description = "保存网站用户注册配置信息",
        tags = {"Admin/Route(后台/网站配置)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "open_registration",
        	type = "integer",
        	in = "formData",
        	description = "是否开放用户注册;1:开放,0:不开放",
        ),
        @SWG\Parameter(
        	name = "banned_usernames",
        	type = "string",
        	in = "formData",
        	description = "特殊用户名",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function userPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			unset($data['token']);
			$result = Db::connect('db_config'.parent::$db_id)->name('option')->where('option_name','user_info')->setField('option_value',json_encode($data));
			if($result){
				cache('cmf_options_user_info_by_'.parent::$db_id,null);
				$this->info(1,'保存成功');
			}else{
				$this->info(0,'保存失败');
			}
		}
	}

	/**
	@SWG\Post(
        path = "/admin/Setting/commentPost",
        summary = "保存网站评论配置信息",
        description = "保存网站评论配置信息",
        tags = {"Admin/Route(后台/网站配置)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "open_comment",
        	type = "integer",
        	in = "formData",
        	description = "是否开放用户评论;1:开放,0:不开放",
        ),
        @SWG\Parameter(
        	name = "comment_need_check",
        	type = "integer",
        	in = "formData",
        	description = "发表评论是否需要审核",
        ),
        @SWG\Parameter(
        	name = "comment_allow_anonymous",
        	type = "integer",
        	in = "formData",
        	description = "是否允许匿名评论",
        ),
        @SWG\Parameter(
        	name = "comment_time_interval",
        	type = "integer",
        	in = "formData",
        	description = "评论时间间隔(秒)",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function commentPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			unset($data['token']);
			$result = Db::connect('db_config'.parent::$db_id)->name('option')->where('option_name','comment_info')->setField('option_value',json_encode($data));
			if($result){
				cache('cmf_options_comment_info_by_'.parent::$db_id,null);
				$this->info(1,'保存成功');
			}else{
				$this->info(0,'保存失败');
			}
		}
	}


	/**
	@SWG\Post(
        path = "/admin/Setting/uploadPost",
        summary = "保存网站上传设置信息",
        description = "保存网站上传设置信息",
        tags = {"Admin/Route(后台/网站配置)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "max_files",
        	type = "integer",
        	in = "formData",
        	description = "最大同时上传文件数",
        ),
        @SWG\Parameter(
        	name = "image_max_filesize",
        	type = "string",
        	in = "formData",
        	description = "允许上传图片大小(单位B)",
        ),
        @SWG\Parameter(
        	name = "image_extensions",
        	type = "string",
        	in = "formData",
        	description = "允许上传图片扩展名,以英文逗号分隔",
        ),
        @SWG\Parameter(
        	name = "video_max_filesize",
        	type = "string",
        	in = "formData",
        	description = "允许上传视频大小(单位B)",
        ),
        @SWG\Parameter(
        	name = "video_extensions",
        	type = "string",
        	in = "formData",
        	description = "允许上传视频扩展名,以英文逗号分隔",
        ),
        @SWG\Parameter(
        	name = "audio_max_filesize",
        	type = "string",
        	in = "formData",
        	description = "允许上传音频大小(单位B)",
        ),
        @SWG\Parameter(
        	name = "audio_extensions",
        	type = "string",
        	in = "formData",
        	description = "允许上传音频扩展名,以英文逗号分隔",
        ),
        @SWG\Parameter(
        	name = "file_max_filesize",
        	type = "string",
        	in = "formData",
        	description = "允许上传附件大小(单位B)",
        ),
        @SWG\Parameter(
        	name = "audio_extensions",
        	type = "string",
        	in = "formData",
        	description = "允许上传附件扩展名,以英文逗号分隔",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function uploadPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			unset($data['token']);
			$result = Db::connect('db_config'.parent::$db_id)->name('option')->where('option_name','upload_info')->setField('option_value',json_encode($data));
			if($result){
				cache('cmf_options_upload_info_by_'.parent::$db_id,null);
				$this->info(1,'保存成功');
			}else{
				$this->info(0,'保存失败');
			}
		}
	}

	/**
	@SWG\Post(
        path = "/admin/Setting/clearCache",
        summary = "清空缓存",
        description = "清空缓存",
        tags = {"Admin/Route(后台/网站配置)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function clearCache(){
		Cache::clear();
		$this->info(1,'缓存已更新！');
	}

}