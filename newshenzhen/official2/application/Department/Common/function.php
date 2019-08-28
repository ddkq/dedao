<?php








/**
 * 获取科室介绍
 * @param int $tid 科室id
 * @param str $tag 读取字段
 * @param array $w where条件
 * @return array 返回指定科室的介绍
 */
function sp_get_department_post($tid,$tag,$w){
	$where=array();
	$where = $w;
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';

	//根据参数生成查询条件
	$where['status'] = array('eq',1);
	$where['term_id'] = array('eq',$tid);

	$department_post_model= M("DepartmentPost");
	$post=$department_post_model->field($field)->where($where)->find();
	return $post;
}



/**
 * 获取指定id的医生
 * @param int $tid 分类表下的tid.
 * @param string $tag 查询标签，以字符串方式传入,例："field:post_title,post_content;"<br>
 *	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * @return array 返回指定id的文章
 */
function sp_sql_doctor($tid,$tag){
	$where=array();
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';

	//根据参数生成查询条件
	$where['status'] = array('eq',1);
	$where['id'] = array('eq',$tid);

	$doctor_model= M("Doctor");

	$post=$doctor_model->field($field)->where($where)->find();
	return $post;
}


/**
 * 查询医生列表，不做分页
 * @param string $tag  查询标签，以字符串方式传入,例："cid:1,2;field:post_title,post_content;limit:0,8;order:post_date desc,listorder desc;where:id>0;"<br>
 *  ids:调用指定id的一个或多个数据,如 1,2,3<br>
 * 	cid:数据所在分类,可调出一个或多个分类数据,如 1,2,3 默认值为全部,在当前分类为:'.$cid.'<br>
 * 	field:调用post指定字段,如(id,post_title...) 默认全部<br>
 * 	limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)<br>
 * 	order:排序方式，如：post_date desc<br>
 *	where:查询条件，字符串形式，和sql语句一样
 * @param array $where 查询条件，（暂只支持数组），格式和thinkphp where方法一样；
 */
function sp_sql_doctors($tag,$where=array()){
	if(!is_array($where)){
		$where=array();
	}
	
	$tag=sp_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '';
	$order = !empty($tag['order']) ? $tag['order'] : 'b.listorder desc';


	//根据参数生成查询条件
	$where['status'] = array('eq',1);
	$where['post_status'] = array('eq',1);
	$phone = sp_is_mobile();
	if($phone == 1){
		$where['compatible'] = array('in','0,2');
	}else{
		$where['compatible'] = array('in','0,1');
	}

	if (isset($tag['cid'])) {
		$where['department_id'] = array('in',$tag['cid']);
	}
	
	if (isset($tag['ids'])) {
		$where['doctor_id'] = array('in',$tag['ids']);
	}
	


	$join = "".C('DB_PREFIX').'doctor as b on a.doctor_id =b.id';
	$rs= M("DepartmentRelationships");

	$posts=$rs->alias("a")->join($join)->field($field)->where($where)->order($order)->limit($limit)->select();
	return $posts;
}

function sp_sql_doctors_bycatid($cid,$tag,$where=array()){
	$cid=intval($cid);
	$catIDS=array();
	$terms=M("Department")->field("term_id")->where("status=1 and ( term_id=$cid OR path like '%-$cid-%' )")->order('term_id asc')->select();

	foreach($terms as $item){
		$catIDS[]=$item['term_id'];
	}
	if(!empty($catIDS)){
		$catIDS=implode(",", $catIDS);
		$catIDS="cid:$catIDS;";
	}else{
		$catIDS="";
	}
	$content= sp_sql_doctors($catIDS.$tag,$where);
	return $content;

}

/**
 * 返回指定分类
 * @param int $term_id 分类id
 * @return array 返回符合条件的分类
 */
function sp_get_term($term_id){
	
	$terms=F('department');
	if(empty($terms)){
		$term_obj= M("Department");
		$terms=$term_obj->where("status=1")->select();
		$mterms=array();
		
		foreach ($terms as $t){
			$tid=$t['term_id'];
			$mterms["t$tid"]=$t;
		}
		
		F('department',$mterms);
		return $mterms["t$term_id"];
	}else{
		return $terms["t$term_id"];
	}
}

/**
 * 返回指定分类下的所有子分类
 * @param int $term_id 分类id
 * @return array 返回指定分类下的所有子分类
 */
function sp_get_all_child_terms($term_id){
    $term_id = intval($term_id);
    $term_obj = M("Department");
    if ($term_id !== 0) {
        $category = $term_obj->field('path')->where("term_id=$term_id")->find();
        if (empty($category)) {
            return [];
        }

        $categoryPath = $category['path'];
    } else {
        $categoryPath = 0;
    }

    $where = [
        'status'      => 1,
        'delete_time' => 0,
        'path'        => ['like', "$categoryPath-%"]
    ];

    return $term_obj->field('term_id,name')->where($where)->select();
}



/**
 * 获取pc应用当前模板下的模板列表
 * @return array
 */
function sp_admin_get_tpl_file_list(){
	$template_path=C("SP_TMPL_PATH").C("SP_DEFAULT_THEME")."/Department/";
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
	$template_path=C("SP_TMPL_PATH").C("SP_DEFAULT_THEME_PHONE")."/Department/";
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
 * 生成时间列表
 */
function get_working_time(){
	$working_time = F("working_time");
	if(empty($working_time)){
		$working_time = array(
			"11"=>"周一上午","12"=>"周一中午","13"=>"周一下午",
			"21"=>"周二上午","22"=>"周二中午","23"=>"周二下午",
			"31"=>"周三上午","32"=>"周三中午","33"=>"周三下午",
			"41"=>"周四上午","42"=>"周四中午","43"=>"周四下午",
			"51"=>"周五上午","52"=>"周五中午","53"=>"周五下午",
			"61"=>"周六上午","62"=>"周六中午","63"=>"周六下午",
			"71"=>"周日上午","72"=>"周日中午","73"=>"周日下午"
		);
		//var_dump($working);exit;
		F("working_time", $working_time);
	}
	return $working_time;	
}






