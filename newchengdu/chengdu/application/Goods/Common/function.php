<?php
	
/**
 * 获取指定id的商品
 * @param int $tid 分类表下的tid.
 * @param string $tag 查询标签，以字符串方式传入,例："field:post_title,post_content;"<br>
 *	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * @return array 返回指定id的文章
 */
function sp_sql_goods($tid,$tag){
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';

	//根据参数生成查询条件
	$where['good_status'] = array('eq',1);
	$where['good_id'] = array('eq',$tid);

	$goods_model= M("Goods");

	$post=$goods_model->field($field)->where($where)->find();
	return $post;
}


/**
 * 查询商品列表，不做分页
 */
function sp_sql_goods_lists($tag,$where=array()){
	if(!is_array($where)){
		$where=array();
	}
	
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '';
	$order = !empty($tag['order']) ? $tag['order'] : 'add_time';


	//根据参数生成查询条件
	$where['good_status'] = array('eq',1);


	if (isset($tag['cid'])) {
		$where['term_id'] = array('in',$tag['cid']);
	}


	$rs= M("Goods");

	$posts=$rs->field($field)->where($where)->order($order)->limit($limit)->select();
	//$rs->_sql();exit;
	return $posts;
}

/**
 * 功能：根据商品分类ID 获取该分类下所有商品（包含子分类中商品
 */

function sp_sql_goods_bycatid($cid,$tag,$where=array()){
	$cid=intval($cid);
	$catIDS=array();
	$terms=M("Terms")->field("term_id")->where("status=1 and ( term_id=$cid OR path like '%-$cid-%' )")->order('term_id asc')->select();

	foreach($terms as $item){
		$catIDS[]=$item['term_id'];
	}
	if(!empty($catIDS)){
		$catIDS=implode(",", $catIDS);
		$catIDS="cid:$catIDS;";
	}else{
		$catIDS="";
	}
	$content= sp_sql_goods_lists($catIDS.$tag,$where);
	return $content;

}

	
/**
 * 查询热销商品列表
 */
function sp_get_hots($tag,$where=array()){
	if(!is_array($where)){
		$where=array();
	}
	
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '';
	$order = !empty($tag['order']) ? $tag['order'] : 'add_time';


	//根据参数生成查询条件
	$where['good_status'] = array('eq',1);
	$where['is_hot'] = array('eq',1);


	if (isset($tag['cid'])) {
		$where['term_id'] = array('in',$tag['cid']);
	}

	$rs= M("Goods");
	$posts=$rs->field($field)->where($where)->order($order)->limit($limit)->select();
	//$rs->_sql();exit;
	return $posts;
}
	
/**
 * 功能：根据分类商品分类ID 获取该分类下所有商品（包含子分类中商品），调用方式同sp_get_hots 
 */

function sp_get_hots_bycatid($cid,$tag,$where=array()){
	$cid=intval($cid);
	$catIDS=array();
	$terms=M("Goodsterms")->field("term_id")->where("status=1 and ( term_id=$cid OR path like '%-$cid-%' )")->order('term_id asc')->select();

	foreach($terms as $item){
		$catIDS[]=$item['term_id'];
	}
	if(!empty($catIDS)){
		$catIDS=implode(",", $catIDS);
		$catIDS="cid:$catIDS;";
	}else{
		$catIDS="";
	}
	$content= sp_get_hots($catIDS.$tag,$where);
	return $content;

}	
	
/**
 * 查询新品商品列表
 * @param string $tag  查询标签，以字符串方式传入,例："cid:1,2;field:post_title,post_content;limit:0,8;order:post_date desc,listorder desc;where:id>0;"<br>
 *  ids:调用指定id的一个或多个数据,如 1,2,3<br>
 * 	cid:数据所在分类,可调出一个或多个分类数据,如 1,2,3 默认值为全部,在当前分类为:'.$cid.'<br>
 * 	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * 	limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)<br>
 * 	order:排序方式，如：post_date desc<br>
 *	where:查询条件，字符串形式，和sql语句一样
 * @param array $where 查询条件，（暂只支持数组），格式和thinkphp where方法一样；
 */
function sp_get_new($tag,$where=array()){
	if(!is_array($where)){
		$where=array();
	}
	
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '6';
	$order = !empty($tag['order']) ? $tag['order'] : 'add_time';


	//根据参数生成查询条件
	$where['good_status'] = array('eq',1);
	$where['is_new'] = array('eq',1);


	if (isset($tag['cid'])) {
		$where['term_id'] = array('in',$tag['cid']);
	}

	$rs= M("Goods");
	$posts=$rs->field($field)->where($where)->order($order)->limit($limit)->select();
	//$rs->_sql();exit;
	return $posts;
}	
	
	
/**
 * 文章分页查询方法
 * @param string $tag  查询标签，以字符串方式传入,例："cid:1,2;field:post_title,post_content;limit:0,8;order:post_date desc,listorder desc;where:id>0;"<br>
 * 	ids:调用指定id的一个或多个数据,如 1,2,3<br>
 * 	cid:数据所在分类,可调出一个或多个分类数据,如 1,2,3 默认值为全部,在当前分类为:'.$cid.'<br>
 * 	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * 	limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)<br>
 * 	order:排序方式，如：post_date desc<br>
 *	where:查询条件，字符串形式，和sql语句一样
 * @param int $pagesize 每页条数.
 * @param string $pagetpl 以字符串方式传入,例："{first}{prev}{liststart}{list}{listend}{next}{last}"
 * @return array 带分页数据的文章列表
 
 */

function sp_sql_goods_paged($tag,$pagesize=20,$pagetpl='{first}{prev}{liststart}{list}{listend}{next}{last}',$w,$o){
	$where=array();
	$where = $w;
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '';
	if(!empty($o)){
		$order = $o;
	}else{
		$order = !empty($tag['order']) ? $tag['order'] : 'add_time desc';
	}
	

	//根据参数生成查询条件
	$where['good_status'] = array('eq',1);


	if (isset($tag['cid'])) {
		$where['term_id'] = array('in',$tag['cid']);
	}

	
	if (isset($tag['where'])) {
		$where['_string'] = $tag['where'];
	}
	

	$rs= M("Goods");
	$totalsize=$rs->field($field)->where($where)->count();
	
	import('Page');
	if ($pagesize == 0) {
		$pagesize = 20;
	}
	$PageParam = C("VAR_PAGE");
	$page = new \Page($totalsize,$pagesize,intval($tag['cid']));
	$page->setLinkWraper("li");
	$page->__set("PageParam", $PageParam);
	$page->SetPager('default', $pagetpl, array("listlong" => "4", "first" => "首页", "last" => "尾页", "prev" => "上一页", "next" => "下一页", "list" => "*", "disabledclass" => ""));
	//var_dump(intval($tag['cid']));exit;
	$posts=$rs->field($field)->where($where)->order($order)->limit($page->firstRow . ',' . $page->listRows)->select();

	$content['posts']=$posts;
	$content['page']=$page->show('default');
	$content['count']=$totalsize;
	return $content;
}	
	
	
	
	
/**
 * 功能：根据分类文章分类ID 获取该分类下所有文章（包含子分类中文章），已经分页，调用方式同sp_sql_posts_paged<br>
 * @author labulaka 2014-11-09 14:30:49
 * @param int $tid 文章分类ID.
 * @param string $tag 查询标签，以字符串方式传入,例："field:post_title,post_content;limit:0,8;order:post_date desc,listorder desc;where:id>0;"<br>
 * 		field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * 		limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)<br>
 * 		order:排序方式，如：post_date desc<br>
 *		where:查询条件，字符串形式，和sql语句一样
 * @param int $pagesize 每页条数.
 * @param string $pagetpl 以字符串方式传入,例："{first}{prev}{liststart}{list}{listend}{next}{last}"
 */

function sp_sql_goods_paged_bycatid($cid,$w,$o,$tag,$pagesize=6,$pagetpl='{first}{prev}{liststart}{list}{listend}{next}{last}'){
	$where = $w;
	$cid=intval($cid);
	$catIDS=array();
	$terms=M("Goodsterms")->field("term_id")->where("status=1 and ( term_id=$cid OR path like '%-$cid-%' )")->order('term_id asc')->select();
	
	foreach($terms as $item){
		$catIDS[]=$item['term_id'];
	}
	if(!empty($catIDS)){
		$catIDS=implode(",", $catIDS);
		$catIDS="cid:$catIDS;";
	}else{
		$catIDS="";
	}
	$content= sp_sql_goods_paged($catIDS.$tag,$pagesize,$pagetpl,$where,$o);
	return $content;

}	
	
	
	
	
	
/**
 * 判断商品指定分类下是否有子分类
 * @param int $term_id 分类id
 * @return boolean
 */
function sp_is_goods_child_terms($term_id){

	$term_id=intval($term_id);
	$term_obj = M("Goodsterms");
	$terms=$term_obj->where("status=1 and parent=$term_id")->order("listorder asc")->select();
	if($terms){
		return true;
	}else{
		return false;
	}
	
}


/**
 * 返回指定分类
 * @param int $term_id 分类id
 * @return array 返回符合条件的分类
 */
function sp_get_goods_term($term_id){
	
	$terms=F('Goodsterms');
	if(empty($terms)){
		$term_obj= M("Goodsterms");
		$terms=$term_obj->where("status=1")->select();
		$mterms=array();
		
		foreach ($terms as $t){
			$tid=$t['term_id'];
			$mterms["t$tid"]=$t;
		}
		
		F('Goodsterms',$mterms);
		return $mterms["t$term_id"];
	}else{
		return $terms["t$term_id"];
	}
}


/**
 * 返回指定分类下的子分类
 * @param int $term_id 分类id
 * @return array 返回指定分类下的子分类
 */
function sp_get_goods_child_terms($term_id){

	$term_id=intval($term_id);
	$term_obj = M("Goodsterms");
	$terms=$term_obj->where("status=1 and parent=$term_id")->order("listorder asc")->select();
	
	return $terms;
}




function sp_get_group($id){
	$good_id = intval($id);
	
	$where = array();
	$where['goods_id'] = $good_id;
	$where['group_type'] = 0;
	
	$group_obj = M("Group");
	$group = $group_obj->where($where)->select();
	return $group;
}




















/**
 * 获取pc应用当前模板下的模板列表
 * @return array
 */
function sp_admin_get_tpl_file_list(){
	$template_path=C("SP_TMPL_PATH").C("SP_DEFAULT_THEME")."/Encyclopedia/";
	$files=sp_scan_dir($template_path."*");
	$tpl_files=array();
	foreach ($files as $f){
		if($f!="." || $f!=".."){
			if(is_file($template_path.$f)){
				$suffix=C("TMPL_TEMPLATE_SUFFIX");
				$result=preg_match("/$suffix$/", $f);
				if($result){
					$tpl=str_replace($suffix, "", $f);
					$tpl_files[$tpl]=$tpl;
				}else if(preg_match("/\.php$/", $f)){
				    $tpl=str_replace($suffix, "", $f);
				    $tpl_files[$tpl]=$tpl;
				}
			}
		}
	}
	return $tpl_files;
}

/**
 * 获取手机应用当前模板下的模板列表
 * @return array
 */
function sp_admin_get_tpl_file_list_phone(){
	$template_path=C("SP_TMPL_PATH").C("SP_DEFAULT_THEME_PHONE")."/Encyclopedia/";
	$files=sp_scan_dir($template_path."*");
	$tpl_files=array();
	foreach ($files as $f){
		if($f!="." || $f!=".."){
			if(is_file($template_path.$f)){
				$suffix=C("TMPL_TEMPLATE_SUFFIX");
				$result=preg_match("/$suffix$/", $f);
				if($result){
					$tpl=str_replace($suffix, "", $f);
					$tpl_files[$tpl]=$tpl;
				}else if(preg_match("/\.php$/", $f)){
				    $tpl=str_replace($suffix, "", $f);
				    $tpl_files[$tpl]=$tpl;
				}
			}
		}
	}
	return $tpl_files;
}


/**
 * 获取配置详细列表
 */
function sp_cat_list($id){
	$obj = D("Common/ArticleCat");
	$list=$obj->where("cat_value=".$id)->select();
	return $list;
}









