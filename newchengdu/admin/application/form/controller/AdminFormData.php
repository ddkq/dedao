<?php
namespace app\form\controller;
use app\common\controller\AdminBase;
use app\form\model\FormDataModel;
use app\form\model\FormModel;
use think\Db;


/**
* 表单数据
*/
class AdminFormData extends AdminBase{

	//protected $formModel;
	protected $formDataModel;

	public function initialize(){
		parent::initialize();
		//$this->formModel = new FormModel();
		$this->formDataModel = new FormDataModel();
	}
	
	/**
	@SWG\Post(
		path = "/form/Admin_Form_Data/index",
		summary = "获取表单数据",
		description = "获取表单数据",
		tags = {"Admin/Form(后台/表单管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(ref="#/parameters/page"),
		@SWG\Parameter(ref="#/parameters/start_time"),
		@SWG\Parameter(ref="#/parameters/end_time"),
		@SWG\Response(
			response = "200",
			description = "表单数据",
			@SWG\Schema(
				required = {"data"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
    					property = "current_page",
    					type = "integer",
    					description = "当前页码",
    				),
    				@SWG\Property(
    					property = "last_page",
    					type = "integer",
    					description = "页码总数",
    				),
    				@SWG\Property(
    					property = "per_page",
    					type = "integer",
    					description = "每页显示的数量",
    				),
    				@SWG\Property(
    					property = "total",
    					type = "integer",
    					description = "表单总数",
    				),
    				@SWG\Property(
    					property = "data",
    					type = "array",
    					description = "具体数据",
    					@SWG\Items(
    						@SWG\Property(
    							property = "id",
    							type = "integer",
    							description = "表单数据id",
    						),
    						@SWG\Property(
    							property = "data",
    							type = "array",
    							description = "具体内容",
    							@SWG\Items(
    								@SWG\Property(
    									property = "name",
    									type = "string",
    									description = "姓名",
    								),
    								@SWG\Property(
    									property = "phone",
    									type = "string",
    									description = "电话",
    								),
    								@SWG\Property(
    									property = "age",
    									type = "string",
    									description = "年龄",
    								),
    								@SWG\Property(
    									property = "symptom",
    									type = "string",
    									description = "症状",
    								),
    								@SWG\Property(
    									property = "etc",
    									type = "string",
    									description = "相关内容",
    								),
    							),
    						),
    						@SWG\Property(
    							property = "ip",
    							type = "string",
    							description = "数据提交的ip地址",
    						),
    						@SWG\Property(
    							property = "page",
    							type = "string",
    							description = "数据提交的页面",
    						),
    						@SWG\Property(
    							property = "create_time",
    							type = "string",
    							description = "提交时间",
    						),
    					),
    				),
				),
			),
		),
	),
	*/
	public function index(){
		$param = $this->request->param();
		$data = $this->formDataModel->dataList($param);
		return json($data);
	}

	//处理数据
	public function deal(){
		$id = $this->request->param('id');
		if(empty($id)){
			$this->info(0,'非法操作');
		}
		$result = $this->formDataModel->where('id',$id)->setField('status',1);
		if($result){
			$this->info(1,'处理成功');
		}else{
			$this->info(0,'处理失败');
		}
	}

	/**
	@SWG\Post(
		path = "/form/Admin_Form_Data/delete",
		summary = "删除表单数据",
		description = "删除表单数据",
		tags = {"Admin/Form(后台/表单管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "删除数据id",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function delete(){
		$id = $this->request->param('id');
		if(empty($id)){
			$this->info(0,'非法操作');
		}
		$result = $this->formDataModel->isUpdate(true)->save(['delete_time' => time()],['id' => $id,'delete_time' => 0]);
		if($result){
			$user_id = cmf_get_current_admin_id();
			$time = $this->formDataModel->where('id',$id)->value('create_time');
			$name = '表单数据'.date('Y-m-d H:i:s',$time);
			$data = [
				'object_id'		=>	$id,
				'create_time'	=>	time(),
				'table_name'	=>	'form_data',
				'name'			=>	$name,
				'user_id'		=>	$user_id
			];
			Db::connect('db_config'.$db_id)->name('RecycleBin')->insert($data);
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
		
	}

	//导出数据(当前表单，必须含表单id)
	/*public function exportExcelByFormid(){
		$param = $this->request->param();
		if(empty($param['id'])){
			$this->info(0,'非法操作');
		}
		//获取表单结构
		$form = $this->formModel->where('id',$param['id'])->find();
		$content = $form['content'];
		array_pop($content);

		//设置表头
		$fileheader = array();
		$fileheader[0] = "id";
		array_push($fileheader,"当前页","ip","提交时间");
		foreach ($content as $key => $value) {
			$fileheader[$key+4] = $value['name'];
		}

		//获取数据
		$data = $this->formDataModel->dataListByFormidNoPage($param);
		if(!empty($data)){
			foreach ($data as $key => $value) {
				$data[$key]['create_time'] = date('Y-m-d H:i:s',$value['create_time']);
				$content = json_decode($value['content'],true);
				foreach ($content as $k1 => $v1) {
					$data[$key][$k1] = $v1;
				}
				unset($data[$key]['content']);
			}	
		}else{
			$this->info(0,'所选表单数据为空');
		}
		//数据中对应的字段，用于读取相应数据
		$keys = array_keys($data[0]);

		$excel = new Excel();
		$excel->exportExcel($form['form_name'], $data, $fileheader, $keys);
	}

	//导出全部数据
	/*public function exportExcel(){
		$param = $this->request->param();

		//设置表头
		$fileheader = array("id","当前页","ip","提交时间",'对应表单','姓名','电话','症状','年龄','性别','预约时间','其他信息');

		//获取数据
		$data = $this->formDataModel->allDataListNoPage($param);
		if(!empty($data)){
			foreach ($data as $key => $value) {
				$data[$key]['create_time'] = date('Y-m-d H:i:s',$value['create_time']);
				$content = json_decode($value['content'],true);
				foreach ($content as $k1 => $v1) {
					$data[$key][$k1] = $v1;
				}
				unset($data[$key]['content']);
			}	
		}else{
			$this->info(0,'所选表单数据为空');
		}
		//数据中对应的字段，用于读取相应数据
		$keys = array_keys($data[0]);
		dump($data);
		dump($fileheader);
		dump($keys);exit;

		$excel = new Excel();
		$excel->exportExcel('导出数据', $data, $fileheader, $keys);
	}*/

	//导出数据
	public function exportExcel(){
		$param = $this->request->param();

		//获取数据
		$data = $this->formDataModel->dataListNoPage($param);
		if(!empty($data)){
			foreach ($data as $key => $value) {
				$data[$key]['create_time'] = date('Y-m-d H:i:s',$value['create_time']);
				$content = json_decode($value['content'],true);
				foreach ($content as $k1 => $v1) {
					$data[$key][$k1] = $v1;
				}
				unset($data[$key]['content']);
				return json($data);
			}	
		}else{
			$this->info(0,'所选表单数据为空');
		}
	}

}