<?php
namespace Tables\Controller;
use Common\Controller\AdminbaseController;
use PHPExcel_IOFactory;
use PHPExcel;
class AdminTablesController extends AdminbaseController {

	protected $tables_model;
	protected $tablesoptions_model;
	protected $tablesdata_model;

	
	function _initialize() {
		parent::_initialize();
		$this->tables_model = D('Tables/Tables');
		$this->tablesoptions_model = D('Tables/TablesOptions');
		$this->tablesdata_model = D('Tables/TablesData');
	}

	function index(){
		$this->_lists();
		$this->display();
	}

	function add(){
		$single = $this->tablesoptions_model->where('type = 0')->select();
		$multiple = $this->tablesoptions_model->where('type = 1')->select();
		$this->assign('single',$single);
		$this->assign('multiple',$multiple);
		$this->display();
	}

	function add_post(){
		//var_dump($_POST);exit;
		if(IS_POST){

			$data['name'] = $_POST['name'];
			$data['content'] = json_encode($_POST['content']);
			$data['createtime'] = date ('Y-m-d H:i:s');

			if($this->tables_model->create()){
				$result = $this->tables_model->add($data);
				if($result){
					$this->success("添加成功！");
				}else{
					$this->error('添加失败！');
				}
			}else{
				$this->error($this->tables_model->getError());
			}
		}
	}

	function edit(){
		$id = intval(I("get.id"));
		$post = $this->tables_model->where("id = $id")->find();
		$content = json_decode($post['content'],true);
		$submit = array_pop($content);
		$this->assign('id',$id);
		$this->assign("post",$post);
		$this->assign('content',$content);
		$this->assign('submit',$submit);

		$options = $this->tablesoptions_model->select();
		$this->assign('options',$options);

		$this->display();
	}

	function edit_post(){
		if(IS_POST){
			//var_dump($_POST);exit;

			$id = $_POST['id'];
			$data['name'] = $_POST['name'];
			$data['content'] = json_encode($_POST['content']);

			$result=$this->tables_model->where("id = $id")->save($data);
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}

	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['status'] = 0;
			if ($this->tables_model->where("id = $id")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}

	function copy(){
		if(isset($_GET['id'])){
			$id = intval(I('get.id'));
			$data = $this->tables_model->where('id = $id')->find();
			unset($data['id']);
			$data['name'] = $data['name'].'1';
			$data['content'] = json_encode($data['content']);
			if ($this->tables_model->add($data)) {
				$this->success("复制成功！");
			} else {
				$this->error("复制失败！");
			}
		}
	}


	function determine(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['status'] = 1;
			if($this->tablesdata_model->where("id=$id")->save($data)){
				$this->success("操作成功");
			}else{
				$this->error("操作失败");
			}

		}
	}


	/*数据查看(全部)*/
	function view_data(){
		$this->_lists2();
		$this->display();
	}

	/*数据删除*/
	function view_data_delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['status'] = 0;
			if ($this->tablesdata_model->where("id = $id")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}

	/*数据查看(当前表)*/
	function view(){
		$id = intval(I('id'));
		$data = $this->tables_model->where("id = $id")->find();

		$content = json_decode($data['content'],true);
		array_pop($content);
		$this->assign('content',$content);
		$this->assign('id',$id);
			
		$count=$this->tablesdata_model->where("tables_id = $id")->count();
			
		$page = $this->page($count, 20);
			
		$posts=$this->tablesdata_model->where("tables_id = $id")
		->limit($page->firstRow . ',' . $page->listRows)
		->order("createtime DESC")->select();

		//var_dump($posts);exit;

		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);

		$this->display();
	}

	/*数据查看(全部)_导出excel*/
	function data_excel(){
		
		$fileheader = array('id','当前页','ip',"提交时间","姓名","电话","症状","年龄","性别","其他内容","对应表单",);
		
		
		$where_ands = array();


		$fields=array(
				'start_time'=> array("field"=>"createtime","operator"=>">"),
				'end_time'  => array("field"=>"createtime","operator"=>"<"),
				'page'  => array("field"=>"page","operator"=>"="),
				"ip"	=> array("field"=>"ip","operator"=>"="),
				"tables_id"	=> array("field"=>"tables_id","operator"=>"="),
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

		$posts=$this->tablesdata_model->where($where)->order("createtime DESC")->relation(true)->select();
		//var_dump($this->tablesdata_model->getLastsql());exit;

		if(!empty($posts)){
			foreach ($posts as $key => $value) {
				unset($posts[$key]['tables_id']);
				unset($posts[$key]['status']);
				$content = json_decode($value['content'],true);
				$posts[$key]['0'] = $content['name'];
				$posts[$key]['1'] = $content['phone'];
				$posts[$key]['2'] = $content['symptom'];
				$posts[$key]['3'] = $content['age'];
				$posts[$key]['4'] = $content['gender'];
				$posts[$key]['5'] = $content['etc'];

				array_push($posts[$key],$posts[$key]['tables']['name']);

				unset($posts[$key]['content']);
				unset($posts[$key]['tables']);
			}
			//var_dump($posts);exit;
			$this->exportExcel($posts,"全部数据",$fileheader,'Sheet1');
		}else{
			$this->error('所选表单数据为空');
		}
		

	}

	/*数据查看(当前表)_导出excel*/
	function excel(){
		$id = $_POST['id'];
		$data = $this->tables_model->where("id = $id")->find();
		$content = json_decode($data['content'],true);
		array_pop($content);

		
		$fileheader = array();
		$fileheader[0] = "id";
		foreach ($content as $key => $value) {
			$fileheader[$key+1] = $value['name'];
		}
		array_push($fileheader,"当前页","ip","提交时间");

		$where_ands=array("tables_id=$id");
		
		$fields=array(
				'start_time'=> array("field"=>"createtime","operator"=>">"),
				'end_time'  => array("field"=>"createtime","operator"=>"<"),
				'page'  => array("field"=>"page","operator"=>"="),
				"ip"	=> array("field"=>"ip","operator"=>"="),
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
		

		$posts=$this->tablesdata_model->where($where)->order("createtime DESC")->select();
		if(!empty($posts)){
			foreach ($posts as $key => $value) {
				unset($posts[$key]['tables_id']);
				$content = json_decode($value['content'],true);
				array_splice($posts[$key],1,0,$content);
				unset($posts[$key]['content']);
			}	
		}else{
			$this->error('所选表单数据为空');
		}
		

		$this->exportExcel($posts,$data['name'],$fileheader,'Sheet1');

	}

	function data_import(){

	}


	function imports(){
		$filename = '.'.sp_get_asset_upload_path(I('excel'));
	    $this->importExcel($filename);
	}
 
	function importExcel($filename){
		//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        vendor('PHPExcel.PHPExcel');
        //创建PHPExcel对象，注意，不能少了\
        $PHPExcel = new \PHPExcel();
        vendor("PHPExcel.PHPExcel.Reader.Excel2007");
        $PHPReader = new \PHPExcel_Reader_Excel2007();
 
 
        //载入文件
        $PHPReader->setReadDataOnly(true);
        $PHPExcel = $PHPReader->load($filename);
        //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
        $currentSheet = $PHPExcel->getSheet(0);
        //获取总列数
        $allColumn = $currentSheet->getHighestColumn();
        //获取总行数
        $allRow = $currentSheet->getHighestRow();
        //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
        for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {
            //从哪列开始，A表示第一列
            for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {
                //数据坐标
                $address = $currentColumn . $currentRow;
                //读取到的数据，保存到数组$data中
                $cell = $currentSheet->getCell($address)->getValue();
 
                if ($cell instanceof PHPExcel_RichText) {
                    $cell = $cell->__toString();
                }
                $data[$currentRow - 1][$currentColumn] = $cell;
                //  print_r($cell);
            }
 
        }
       // 写入数据库操作
       $this->insert_excel($data);
	}

	function insert_excel($d){
		if(empty($d)){
			$this->error('数据为空');
		}else{
			foreach ($d as $key => $value) {
				$data['tables_id'] = 42; 
				$data['content'] = json_encode(array('name'=>$value['A'],'phone'=>$value['B'],'symptom'=>$value['C']));
				$data['createtime'] = date ('Y-m-d H:i:s');
				$data['page'] = '';
				$data['ip'] = '';
				$this->tablesdata_model->add($data);
			}
			$this->success('导入成功');


		}

	}


	 /**
    * 导出excel
    * @param array $data 导入数据
    * @param string $savefile 导出excel文件名
    * @param array $fileheader excel的表头
    * @param string $sheetname sheet的标题名
    */
    public function exportExcel($data, $savefile, $fileheader, $sheetname){

        vendor("PHPExcel.PHPExcel");
		vendor("PHPExcel.Writer.Excel5");
		vendor("PHPExcel.Writer.Excel2007");
		vendor("PHPExcel.IOFactory");
        
        $excel = new \PHPExcel();
        $xlsTitle = iconv('utf-8', 'gb2312', $savefile);
        $savefile = date('YmdHis_').$savefile;
        //设置excel属性
        $objActSheet = $excel->getActiveSheet();
        //根据有生成的excel多少列，$letter长度要大于等于这个值
        $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N');
        //设置当前的sheet
        $excel->setActiveSheetIndex(0);
        //设置sheet的name
        $objActSheet->setTitle($sheetname);
        $objActSheet->getDefaultColumnDimension()->setWidth(20);
        //设置表头
        for($i = 0;$i < count($fileheader);$i++) {
            $objActSheet->setCellValue("$letter[$i]1",$fileheader[$i]); 
        }
        //这里$i初始值设置为2，$j初始值设置为0，自己体会原因
        for ($i = 2;$i <= count($data) + 1;$i++) {
            $j = 0;
            foreach ($data[$i - 2] as $key=>$value) {
            	//var_dump($value);exit;
                $objActSheet->setCellValue("$letter[$j]$i",$value);
                $objActSheet->getStyle("$letter[$j]$i")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
                $objActSheet->getStyle("$letter[$j]$i")->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER); 
                $j++;
            }
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $savefile . '.xlsx"'); 
        // 用户下载excel
        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }




	private  function _lists(){

		if(!empty($_REQUEST['status'])){
			$status = $_REQUEST['status'];
		}else{
			$status = 1;
		}

		$where_ands=array("status=$status");
		
		$fields=array(
				'start_time'=> array("field"=>"createtime","operator"=>">"),
				'end_time'  => array("field"=>"createtime","operator"=>"<"),
				'keyword'  => array("field"=>"name","operator"=>"like"),
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
			
		$count=$this->tables_model
		->where($where)
		->count();
			
		$page = $this->page($count, 20);
			
			
		$posts=$this->tables_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("createtime DESC")->relation(true)->select();

		/*foreach ($posts as $key => $value) {
			$posts[$key]['data_num'] = $child_model->count();
			$posts[$key]['last_time'] = $child_model->order('createtime desc')->getField('createtime');
		}*/

		//var_dump($posts);exit;

		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}

	private function _lists2(){

		$where_ands = array();

		$fields=array(
				'start_time'=> array("field"=>"createtime","operator"=>">"),
				'end_time'  => array("field"=>"createtime","operator"=>"<"),
				'keyword'  => array("field"=>"content","operator"=>"like"),
				'phone'	=> array("field"=>"content","operator"=>"like"),
				'page'	=> array("field"=>"page","operator"=>"like"),
		);
		if(IS_POST){	
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					if($param == 'keyword'){
						$get=json_encode($_POST[$param]);
					}else{
						$get=$_POST[$param];
					}
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
			
		$count=$this->tablesdata_model
		->where($where)
		->count();

		$page = $this->page($count, 20);
			
		$posts=$this->tablesdata_model->where($where)
		->limit($page->firstRow . ',' . $page->listRows)->relation(true)
		->order("createtime DESC")->select();

		//var_dump($this->tablesdata_model->getLastsql());exit;
		
		$tables = $this->tables_model->select();
		$this->assign('tables',$tables);

		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}

}