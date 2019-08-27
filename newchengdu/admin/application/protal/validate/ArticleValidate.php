<?php
namespace app\protal\validate;
use think\Validate;
use think\Db;

/**
 * 后台文章验证器
 */
class ArticleValidate extends Validate{
    protected $rule = [
        'post_title'        => 'require',
        'category_id'       => 'require',
        'published_time'    => 'require',
        'post_content'      => 'require',
    ];

    protected $message = [
        'post_title.require'            => '文章标题不能为空',
        'category_id.require'           => '请选择分类',
        'published_time.require'        => '请输入发布时间',
        'post_content.require'          => '文章内容不能为空'
    ];

}