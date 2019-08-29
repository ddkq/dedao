<?php
namespace Encyclopedia\Controller;
use Common\Controller\AdminbaseController;
class EErelationshipController extends AdminbaseController {

	protected $exterms_model;
	protected $enterms_model;
	protected $link_model;
	
	
	function _initialize() {
		parent::_initialize();
		$this->exterms_model = D("Experience/Exterms");
		$this->enterms_model = D("Encyclopedia/Enterms");
		$this->link_model = D("Common/CatRelationship");
	}
	function index(){
		$result = $this->exterms_model->order(array("listorder"=>"asc"))->select();
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			
			$url = U("EErelationship/edit", array("parent" => $r['term_id']));
			$r['str_manage'] = '<a href="javascript:open_iframe_layer('."'$url'".','."'关联百科分类选择'".');">配置</a>';
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['link_name']='';
			$ex = $this->link_model->where("ex_id=".$r['term_id'].' and type=6')->select();
			foreach($ex as $q){
				$r['link_name'].=$q['link_name'].'|';
			}
			$array[] = $r;
		}
		$tree->init($array);
		$str = "<tr>
					<td>\$id</td>
					<td>\$spacer \$name </td>
					<td>\$link_name</td>
					<td>\$str_manage</td>
				</tr>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
		$this->display();
	}
	
	function edit(){
		$tid = intval(I("get.parent"));
		$term = $this->exterms_model->where("term_id=".$tid)->find();
		$result = $this->enterms_model->order(array("listorder"=>"asc"))->select();
		
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			

			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			
			$ex = $this->link_model->where('type=6 and en_id='.$r['term_id'].' and ex_id='.$tid)->find();
			if($ex){
				$r['check'] = 'checked=checked';
			}else{
				$r['check'] = '';
			}
			
			if(sp_is_en_child_terms($r['term_id'])){
				$r['type'] = 'disabled';
			}else{
				$r['type'] = '';
			}
			
			
			
			
			$array[] = $r;
		}
		//var_dump($array);exit;
		$tree->init($array);
		$str = "
				<li class='checkbox1'>
					\$spacer<input type='checkbox' name='aid[\$id]' value='\$name' \$check \$type>\$name
				</li>
				";
				
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign('term',$term);
		$this->assign("taxonomys", $taxonomys);
		$this->display();
		
		/*$tid = intval(I("get.parent"));
		$term = $this->exterms_model->where("term_id=".$tid)->find();
		$qaterm = $this->enterms_model->where('parent=0')->select();
		
		$this->assign('qaterm',$qaterm);
		$this->display();*/
	}
	
	function edit_post(){
		//var_dump($_POST);exit;
		$parent = intval(I("post.parent"));
		$aid = I("post.aid");
		
		if (IS_POST) {
			$del = $this->link_model->where('ex_id='.$parent.' and type=6')->delete();
			foreach($aid as $k=>$v){
				$rel['ex_id'] = $parent;
				$rel['en_id'] = $k;
				$rel['link_name'] = $v;
				$rel['type'] = 6;
				$this->link_model->add($rel);
			}
			$this->success("修改成功！");
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}