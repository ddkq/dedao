<?php
/*
 * 健康问答
 */
namespace Qa\Controller;
use Common\Controller\AdminbaseController;
class AdminQuestionController extends AdminbaseController {
	protected $question_model;
	protected $answer_model;
	protected $ac_model;
	protected $terms_model;
	
	function _initialize() {
		parent::_initialize();
		$this->question_model = D("Qa/Question");
		$this->answer_model = D("Qa/Answer");
		$this->terms_model = D("Qa/Qaterms");
		$this->ac_model = D("Common/ArticleCat");
	}
	function index(){
		$this->_lists();
		$this->_getTree();
		$this->display();
	}
	
	function add(){
		$terms = $this->terms_model->order(array("listorder"=>"asc"))->select();
		$term_id = intval(I("get.term"));
		//$this->_getcate();
		$this->_getTermTree();
		$term=$this->terms_model->where("term_id=$term_id")->find();
		$istop=$this->ac_model->where('cat_value = 18')->select();
		$recommended=$this->ac_model->where('cat_value = 19')->select();
		$this->assign("istop_type",$istop);
		$this->assign("recommended_type",$recommended);
		$this->assign("author","1");
		$this->assign("term",$term);
		$this->assign("terms",$terms);
		$this->display();
	}
	
	function add_post(){
		if (IS_POST) {
			if(empty($_POST['term_id'])){
				$this->error("请至少选择一个分类栏目！");
			}
			if(empty($_POST['birthday'])){
				unset($_POST['post']['birthday']);
			}
			$_POST['post']['createtime']=date("Y-m-d H:i:s",time());
			$_POST['post']['author_id']=get_current_admin_id();
			$article=I("post.post");
			$article['smeta']=json_encode($_POST['smeta']);
			$article['term_id'] = I("post.term_id");
			$result=$this->question_model->add($article);
			if ($result) {
				$this->success("添加成功！");
			} else {
				$this->error("添加失败！");
			}
		}
	}
	
	public function edit(){
		$id=  intval(I("get.id"));
		$post=$this->question_model->where("id=$id")->find();
		$terms=$this->terms_model->where("term_id=".$post['term_id'])->find();
		$this->_getTermTree($terms);
		$istop=$this->ac_model->where('cat_value = 18')->select();
		$recommended=$this->ac_model->where('cat_value = 19')->select();
		$this->assign("istop_type",$istop);
		$this->assign("recommended_type",$recommended);
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		$this->display();
	}
	
	public function edit_post(){
		if (IS_POST) {
			//var_dump($_POST);exit;
			if(empty($_POST['term_id'])){
				$this->error("请至少选择一个分类栏目！");
			}
			$id=intval($_POST['post']['id']);
			unset($_POST['post']['author_id']);
			$article=I("post.post");
			$article['smeta']=json_encode($_POST['smeta']);
			$article['term_id'] = I("post.term_id");
			//var_dump($article);exit;
			$result=$this->question_model->save($article);
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}
	
	
	private  function _lists($status=1){
		$term_id=0;
		if(!empty($_REQUEST["term"])){
			$term_id=intval($_REQUEST["term"]);
			$term=$this->terms_model->where("term_id=$term_id")->find();
			$this->assign("term",$term);
			$_GET['term']=$term_id;
		}
		
		$where_ands=empty($term_id)?array("isdel=$status"):array("term_id = $term_id and post_status=$status");
		
		$fields=array(
				'start_time'=> array("field"=>"createtime","operator"=>">"),
				'end_time'  => array("field"=>"createtime","operator"=>"<"),
				'keyword'  => array("field"=>"title","operator"=>"like"),
		);
		if(IS_POST){
			
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_POST[$param];
					$_GET[$param]=$get;
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}else{
			foreach ($fields as $param =>$val){
				if (isset($_GET[$param]) && !empty($_GET[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_GET[$param];
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}
		
		$where= join(" and ", $where_ands);
		//$where['post_status'] = 1;
			
		$count=$this->question_model
		->where($where)
		->count();
		//echo $this->question_model->_sql();
		//echo $count;exit;	
		$page = $this->page($count, 20);
			
			
		$posts=$this->question_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("id DESC")->select();
		//echo $posts->_sql();exit;
		//var_dump($posts);exit;
		$users_obj = M("Users");
		$users_data=$users_obj->field("id,user_login,sex,birthday")->where("user_status=1")->select();
		$users=array();
		foreach ($users_data as $u){
			$users[$u['id']]=$u;
		}
    	$terms = $this->terms_model->order(array("term_id = $term_id"))->getField("term_id,name",true);
		$this->assign("users",$users);
    	$this->assign("terms",$terms);
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}
	
	private function _getTree(){
		$term_id=empty($_REQUEST['term'])?0:intval($_REQUEST['term']);
		$result = $this->terms_model->order(array("listorder"=>"asc"))->select();
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminTerm/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminTerm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="js-ajax-delete" href="' . U("AdminTerm/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=$term_id==$r['term_id']?"selected":"";
			$array[] = $r;
		}
		
		$tree->init($array);
		$str="<option value='\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
	}
	
	private function _getTermTree($term=array()){
		$result = $this->terms_model->order(array("listorder"=>"asc"))->select();
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminTerm/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminTerm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="js-ajax-delete" href="' . U("AdminTerm/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=in_array($r['term_id'], $term)?"selected":"";
			$r['checked'] =in_array($r['term_id'], $term)?"checked":"";
			$array[] = $r;
		}
		
		$tree->init($array);
		$str="<option value='\$id' id='meau\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		//var_dump($taxonomys);exit;
		$this->assign("taxonomys", $taxonomys);
	}
	
	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['isdel']=0;
			if ($this->question_model->where("id=".$id)->save($data)!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}	
		}
		if(isset($_POST['ids'])){
			$tids=join(",",$_POST['ids']);
			$data['isdel']=0;
			if ($this->question_model->where("id in ($tids)")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	function check(){
		if(isset($_POST['ids']) && $_GET["check"]){
			$data["post_status"]=1;
			$ids=join(",",$_POST['ids']);
			if ( $this->question_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("审核成功！");
			} else {
				$this->error("审核失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["uncheck"]){
			$data["post_status"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->question_model->where("id in ($ids)")->save($data)) {
				$this->success("取消审核成功！");
			} else {
				$this->error("取消审核失败！");
			}
		}
	}
	function top(){
		if(isset($_POST['ids']) && $_GET["top"]){
			$data["istop"]=1;
				
			$ids=join(",",$_POST['ids']);
			if ( $this->question_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("置顶成功！");
			} else {
				$this->error("置顶失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["untop"]){
				
			$data["istop"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->question_model->where("id in ($ids)")->save($data)) {
				$this->success("取消置顶成功！");
			} else {
				$this->error("取消置顶失败！");
			}
		}
	}
	
	function recommend(){
		if(isset($_POST['ids']) && $_GET["recommend"]){
			$data["recommended"]=1;
			$ids=join(",",$_POST['ids']);
			if ( $this->question_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("推荐成功！");
			} else {
				$this->error("推荐失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["unrecommend"]){
			$data["recommended"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->question_model->where("id in ($ids)")->save($data)) {
				$this->success("取消推荐成功！");
			} else {
				$this->error("取消推荐失败！");
			}
		}
	}

	function move(){
		if(IS_POST){
			if(isset($_GET['ids']) && isset($_POST['term_id'])){
				$tids=$_GET['ids'];
				if ( $this->question_model->where("id in ($tids)")->save($_POST) !== false) {
					$this->success("移动成功！");
				} else {
					$this->error("移动失败！");
				}
			}
		}else{
			$parentid = intval(I("get.parent"));
			
			$tree = new \Tree();
			$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
			$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
			$terms = $this->terms_model->order(array("path"=>"asc"))->select();
			$new_terms=array();
			foreach ($terms as $r) {
				$r['id']=$r['term_id'];
				$r['parentid']=$r['parent'];
				$new_terms[] = $r;
			}
			$tree->init($new_terms);
			$tree_tpl="<option value='\$id'>\$spacer\$name</option>";
			$tree=$tree->get_tree(0,$tree_tpl);
			 
			$this->assign("terms_tree",$tree);
			$this->display();
		}
	}
	
	function recyclebin(){
		$this->_lists(0);
		$this->_getTree();
		$this->display();
	}
	
	function clean(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$status=$this->question_model->where("id in ($ids)")->delete();
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$status=$this->question_model->where(array("id"=>$id))->delete();
				if ($status!==false) {
					$this->success("删除成功！");
				} else {
					$this->error("删除失败！");
				}
			}	
		}
	}
	
	function restore(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data["isdel"]=1;
			if ($this->question_model->where("id=$id")->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	
	function count(){
		if(isset($_POST['ids'])){
			$tids=$_POST['ids'];
			foreach($tids as $vo){
				$count=$this->answer_model->where("q_id = $vo")->count();
				$data["answer_num"]=$count;
				$this->question_model->where("id = $vo")->save($data);
			}
			$this->success("计算成功！");
		}
	}
	
}


