<?php
/**
 * 获取指定id的百科
 * @param int $tid 百科id
 * @param string $tag 查询标签，以字符串方式传入,例："field:post_title,post_content;"<br>
 *	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * @return array 返回指定id的百科
 */
function sp_en_post($tid,$tag){
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';

	//根据参数生成查询条件
	$where['status'] = array('eq',1);
	$where['id'] = array('eq',$tid);
	if($phone == 1){
		$where['compatible'] = array('in','0,2');
	}else{
		$where['compatible'] = array('in','0,1');
	}

	$rs= M("Encyclopedia");

	$post=$rs->field($field)->where($where)->find();
	return $post;
}

/**
 * 获取指定百科id的关联文章
 * @param int $tid 百科id
 * @param string $tag 查询标签，以字符串方式传入,例："field:post_title,post_content;"<br>
 *	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * @return array 返回指定百科id的文章
 */
function sp_en_article($tid,$tag){
	$where=array();
	$where1=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '10';
	$order = !empty($tag['order']) ? $tag['order'] : 'post_date';

	//根据参数生成查询条件
	$where['en_id'] = array('eq',$tid);
	$crs = M('CatRelationship');
	$term = $crs->field('term_id')->where($where)->select();
	foreach($term as $a){
		if($a != end($term)){
			$term_id .= $a['term_id'].','; 
		}else{
			$term_id .= $a['term_id']; 
		}
	}
	if(empty($term)){
		return;
	}
	$where1['term_id'] = array('in',$term_id);
	if($phone == 1){
		$where1['compatible'] = array('in','0,2');
	}else{
		$where1['compatible'] = array('in','0,1');
	}
	$rs= M("TermRelationships");
	$join = "".C('DB_PREFIX').'posts as b on a.object_id =b.id';

	$posts=$rs->alias("a")->join($join)->field($field)->where($where1)->order($order)->limit($limit)->select();
	//echo $rs->getLastSql();exit;
	//var_dump($posts);
	return $posts;
}


/**
 * 百科分页查询方法
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

function sp_sql_en_paged($tag,$pagesize=20,$pagetpl='{first}{prev}{liststart}{list}{listend}{next}{last}'){
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '';
	$order = !empty($tag['order']) ? $tag['order'] : 'createtime';

	//根据参数生成查询条件
	$where['post_status'] = array('eq',1);

	if (isset($tag['cid'])) {
		$where['term_id'] = array('in',$tag['cid']);
	}
	
	if (isset($tag['where'])) {
		$where['_string'] = $tag['where'];
	}

	$rs= M("Encyclopedia");
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
 * 功能：根据分类百科分类ID 获取该分类下所有百科（包含子分类中百科），已经分页，调用方式同sp_sql_en_paged
 * @author labulaka 2014-11-09 14:30:49
 * @param int $tid 百科分类ID.
 * @param string $tag 查询标签，以字符串方式传入,例："field:post_title,post_content;limit:0,8;order:post_date desc,listorder desc;where:id>0;"<br>
 * 		field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * 		limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)<br>
 * 		order:排序方式，如：post_date desc<br>
 *		where:查询条件，字符串形式，和sql语句一样
 * @param int $pagesize 每页条数.
 * @param string $pagetpl 以字符串方式传入,例："{first}{prev}{liststart}{list}{listend}{next}{last}"
 */

function sp_sql_en_paged_bycatid($cid,$tag,$pagesize=20,$pagetpl='{first}{prev}{liststart}{list}{listend}{next}{last}'){
	$cid=intval($cid);
	$catIDS=array();
	$terms=M("Enterms")->field("term_id")->where("status=1 and ( term_id=$cid OR path like '%-$cid-%' )")->order('term_id asc')->select();
	
	foreach($terms as $item){
		$catIDS[]=$item['term_id'];
	}
	if(!empty($catIDS)){
		$catIDS=implode(",", $catIDS);
		$catIDS="cid:$catIDS;";
	}else{
		$catIDS="";
	}
	$content= sp_sql_en_paged($catIDS.$tag,$pagesize,$pagetpl);
	return $content;

}




/**
 * 获取指定百科id的关联问答
 * @param int $tid 百科id
 * @param string $tag 查询标签，以字符串方式传入,例："field:post_title,post_content;"<br>
 *	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * @return array 返回指定百科id的文章
 */
function sp_en_qa($tid,$tag){
	$where=array();
	$where1=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : 'a.id,a.title,a.createtime,a.term_id,a.gender,a.birthday,a.isdel,b.q_id,b.author_id,b.content,c.user_nicename,c.user_url,c.avatar';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '4';
	$order = !empty($tag['order']) ? $tag['order'] : 'a.createtime desc';

	//根据参数生成查询条件
	$where['en_id'] = array('eq',$tid);
	$where['type'] = array('eq',5);
	$crs = M('CatRelationship');
	$term = $crs->field('question_id')->where($where)->select();
	//var_dump($term);exit;
	foreach($term as $a){
		if($a != end($term)){
			$term_id .= $a['question_id'].','; 
		}else{
			$term_id .= $a['question_id']; 
		}
	}
	if(empty($term)){
		return;
	}
	$where1['term_id'] = array('in',$term_id);
	$rs= M("Question");
	$join = "".C('DB_PREFIX').'answer as b on a.id =b.q_id';
	$join1 = "".C('DB_PREFIX').'users as c on b.author_id =c.id';

	$posts=$rs->alias("a")->join($join)->join($join1)->field($field)->where($where1)->order($order)->limit($limit)->select();
	//echo $rs->getLastSql();exit;
	//var_dump($posts);
	return $posts;
}

/**
 * 获取指定百科id的关联经验
 * @param int $tid 百科id
 * @param string $tag 查询标签，以字符串方式传入,例："field:post_title,post_content;"<br>
 *	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * @return array 返回指定百科id的经验
 */
function sp_en_ex($tid,$tag){
	$where=array();
	$where1=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : 'id,title,term_id,excerpt,hit,smeta';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '4';
	$order = !empty($tag['order']) ? $tag['order'] : 'createtime desc';

	//根据参数生成查询条件
	$where['en_id'] = array('eq',$tid);
	$where['type'] = array('eq',6);
	$crs = M('CatRelationship');
	$term = $crs->field('ex_id')->where($where)->select();
	//var_dump($term);exit;
	foreach($term as $a){
		if($a != end($term)){
			$term_id .= $a['ex_id'].','; 
		}else{
			$term_id .= $a['ex_id']; 
		}
	}
	if(empty($term)){
		return;
	}
	$where1['term_id'] = array('in',$term_id);
	$where1['post_status'] = array('eq',1);
	if($phone == 1){
		$where1['compatible'] = array('in','0,2');
	}else{
		$where1['compatible'] = array('in','0,1');
	}
	$rs= M("Experience");

	$posts=$rs->field($field)->where($where1)->order($order)->limit($limit)->select();
	//$posts['term_id'] = $term_id;
	//echo $rs->getLastSql();exit;
	//var_dump($posts);
	return $posts;
}


/**
 * 获取指定百科id的关联热点关注文章
 * @param int $tid 百科id
 * @param string $tag 查询标签，以字符串方式传入,例："field:post_title,post_content;"<br>
 *	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * @return array 返回指定百科id的文章
 */
function sp_en_article_hots($tid){
	$where=array();
	$where1=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : 'tid,post_title,post_excerpt,smeta,link_type,post_url,post_hits';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '7';
	$order = !empty($tag['order']) ? $tag['order'] : 'post_date';

	//根据参数生成查询条件
	$where['en_id'] = array('eq',$tid);
	$crs = M('CatRelationship');
	$term = $crs->field('term_id')->where($where)->select();
	foreach($term as $a){
		if($a != end($term)){
			$term_id .= $a['term_id'].','; 
		}else{
			$term_id .= $a['term_id']; 
		}
	}
	if(empty($term)){
		return;
	}
	$where1['term_id'] = array('in',$term_id);
	$where1['status'] = array('eq',1);
	$where1['post_status'] = array('eq',1);
	$where1['recommended'] = array('eq',1);
	$where1['recommended_type'] = array('eq',34);
	if($phone == 1){
		$where1['compatible'] = array('in','0,2');
	}else{
		$where1['compatible'] = array('in','0,1');
	}
	$rs= M("TermRelationships");
	$join = "".C('DB_PREFIX').'posts as b on a.object_id =b.id';
	$posts=$rs->alias("a")->join($join)->field($field)->where($where1)->order($order)->limit($limit)->select();
	//echo $rs->getLastSql();exit;
	//var_dump($posts);
	return $posts;
}

/**
 * 获取指定百科id的关联详解推荐文章
 * @param int $tid 百科id
 * @param string $tag 查询标签，以字符串方式传入,例："field:post_title,post_content;"<br>
 *	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * @return array 返回指定百科id的文章
 */
function sp_en_article_detail($tid){
	$where=array();
	$where1=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : 'a.tid,b.post_title,b.post_excerpt,b.link_type,b.post_url,c.cat_name';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '6';
	$order = !empty($tag['order']) ? $tag['order'] : 'post_date';

	//根据参数生成查询条件
	$where['en_id'] = array('eq',$tid);
	$crs = M('CatRelationship');
	$term = $crs->field('term_id')->where($where)->select();
	foreach($term as $a){
		if($a != end($term)){
			$term_id .= $a['term_id'].','; 
		}else{
			$term_id .= $a['term_id']; 
		}
	}
	if(empty($term)){
		return;
	}
	$where1['status'] = array('eq',1);
	$where1['post_status'] = array('eq',1);
	$where1['term_id'] = array('in',$term_id);
	$where1['recommended'] = array('eq',1);
	$where1['recommended_type'] = array('eq',33);
	if($phone == 1){
		$where1['compatible'] = array('in','0,2');
	}else{
		$where1['compatible'] = array('in','0,1');
	}
	$rs= M("TermRelationships");
	$join = "".C('DB_PREFIX').'posts as b on a.object_id =b.id';
	$join1 = "".C('DB_PREFIX').'article_cat as c on b.select =c.cid';
	$posts=$rs->alias("a")->join($join)->join($join1)->field($field)->where($where1)->order($order)->limit($limit)->select();
	//echo $rs->getLastSql();exit;
	//var_dump($posts);
	return $posts;
}




/**
 * 查询问答列表，不做分页
 * @param string $tag  查询标签，以字符串方式传入,例："cid:1,2;field:post_title,post_content;limit:0,8;order:post_date desc,listorder desc;where:id>0;"<br>
 *  ids:调用指定id的一个或多个数据,如 1,2,3<br>
 * 	cid:数据所在分类,可调出一个或多个分类数据,如 1,2,3 默认值为全部,在当前分类为:'.$cid.'<br>
 * 	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * 	limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)<br>
 * 	order:排序方式，如：post_date desc<br>
 *	where:查询条件，字符串形式，和sql语句一样
 * @param array $where 查询条件，（暂只支持数组），格式和thinkphp where方法一样；
 */
function sp_sql_posts_qa($tid,$tag,$where=array()){
	$where=array();
	$where1=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : 'id,title,status';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '4';
	$order = !empty($tag['order']) ? $tag['order'] : 'createtime desc';

	//根据参数生成查询条件
	if(!empty($tid)){
		$where['term_id'] = array('eq',$tid);
	}
	$where['type'] = array('eq',1);
	$crs = M('CatRelationship');
	$term = $crs->field('question_id')->where($where)->select();
	//var_dump($where);exit;
	foreach($term as $a){
		if($a != end($term)){
			$term_id .= $a['question_id'].','; 
		}else{
			$term_id .= $a['question_id']; 
		}
	}
	if(empty($term)){
		return;
	}
	$where1['term_id'] = array('in',$term_id);
	$rs= M("Question");

	$posts=$rs->field($field)->where($where1)->order($order)->limit($limit)->select();
	//echo $rs->getLastSql();exit;
	//var_dump($posts);exit;
	return $posts;
}

/**
 * 获取百科指定分类（tid）
 * @param int $id 分类tid
 * @return array
 */
function sp_get_en_term($term_id){
	$terms=F('all_enterms');
	if(empty($terms)){
		$term_obj= M("Enterms");
		$terms=$term_obj->where("status=1")->select();
		$mterms=array();
		
		foreach ($terms as $t){
			$tid=$t['term_id'];
			$mterms["t$tid"]=$t;
		}
		
		F('all_enterms',$mterms);
		return $mterms["t$term_id"];
	}else{
		return $terms["t$term_id"];
	}
}

/**
 * 获取百科指定id的所有父级分类
 * @param int $id 分类tid
 * @return array
 */
function sp_get_en_parent_term($term_id){
	$term = F('all_enterms');
	$term_obj = M("Enterms");
	if(empty($term)){
		$path = $term_obj->field('path')->where("term_id = $term_id and status = 1")->find();
		$parents = explode('-',$path[path]);
		for($i=1;$i<=count($parents)-1;$i++){
			$ids .= $parents[$i].',';
		}
		$ids = substr($ids,0,strlen($ids)-1); 
		$terms = $term_obj->where("term_id in ($ids)")->order('path')->select();
		return $terms;
	}else{
		$path = $term["t$term_id"][path];
		$parents = explode('-',$path);
		for($i=1;$i<=count($parents)-1;$i++){
			$ids .= $parents[$i].',';
		}
		$ids = substr($ids,0,strlen($ids)-1); 
		$terms = $term_obj->where("term_id in ($ids)")->order('path')->select();
		return $terms;
	}
}






/**
 * 判断百科指定分类下是否有子分类
 * @param int $term_id 分类id
 * @return boolean
 */
function sp_is_en_child_terms($term_id){

	$term_id=intval($term_id);
	$term_obj = M("Exterms");
	$terms=$term_obj->where("status=1 and parent=$term_id")->order("listorder asc")->select();
	if($terms){
		return true;
	}else{
		return false;
	}
	
}


/**
 * 返回百科指定分类下的子分类
 * @param int $term_id 分类id
 * @return array 返回指定分类下的子分类
 */
function sp_get_en_child_terms($term_id){

	$term_id=intval($term_id);
	$term_obj = M("Exterms");
	$terms=$term_obj->where("status=1 and parent=$term_id")->order("listorder asc")->select();
	
	return $terms;
}
/**
 * 返回符合条件的所有百科分类
 * @param string $tag 查询标签，以字符串方式传入,例："ids:1,2;field:term_id,name,description,seo_title;limit:0,8;order:path asc,listorder desc;where:term_id>0;"<br>
 * 	ids:调用指定id的一个或多个数据,如 1,2,3
 * 	field:调用terms表里的指定字段,如(term_id,name...) 默认全部，用*代表全部
 * 	limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)
 * 	order:排序方式，如：path desc,listorder asc<br>
 * 	where:查询条件，字符串形式，和sql语句一样
 * 
 * @return array 返回符合条件的所有分类
 * 
 */
function sp_get_en_terms($tag){
	
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '';
	$order = !empty($tag['order']) ? $tag['order'] : 'term_id';
	
	//根据参数生成查询条件
	$where['status'] = array('eq',1);
	
	if (isset($tag['ids'])) {
		$where['term_id'] = array('in',$tag['ids']);
	}
	
	if (isset($tag['where'])) {
		$where['_string'] = $tag['where'];
	}
	
	$term_obj= M("Exterms");
	$terms=$term_obj->field($field)->where($where)->order($order)->limit($limit)->select();
	return $terms;
}


function sp_en_getTree(){
	$term_obj= M("Exterms");
	$term_id=empty($_REQUEST['term'])?0:intval($_REQUEST['term']);
	$result = $term_obj->order(array("listorder"=>"asc"))->select();
	$tree = new \Tree();
	$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
	$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
	foreach ($result as $r) {
		$r['str_manage'] = '<a href="' . U("AdminTerm/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminTerm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="js-ajax-delete" href="' . U("AdminTerm/delete", array("id" => $r['term_id'])) . '">删除</a> ';
		$r['visit'] = "<a href='#'>访问</a>";
		$r['taxonomys'] = $r['taxonomy'];
		$r['id']=$r['term_id'];
		$r['parentid']=$r['parent'];
		$r['selected']=$term_id==$r['term_id']?"selected":"";
		$array[] = $r;
	}
	
	$tree->init($array);
	$str="<option value='\$id' \$selected>\$spacer\$name</option>";
	$taxonomys = $tree->get_tree(0, $str);
	return $taxonomys;
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


/**
 * 获取面包屑数据
 * @param int $categoryId 当前文章所在分类,或者当前分类的id
 * @param boolean $withCurrent 是否获取当前分类
 * @return array 面包屑数据
 */
function breadcrumb($categoryId, $withCurrent = false)
{
    $data = [];
    $term_obj= M("Enterms");

    $path = $term_obj->where(['term_id' => $categoryId])->getField('path');

    if (!empty($path)) {
        $parents = explode('-', $path);
        if (!$withCurrent) {
            array_pop($parents);
        }

        if (!empty($parents)) {
            $data = $term_obj->where(['term_id' => ['in', $parents]])->order('path ASC')->select();
        }
    }
    return $data;
}







