<?php
namespace app\department\controller;
use app\common\controller\AdminBase;
use app\department\model\ReservationModel;


/**
* 预约挂号控制器
*/
class AdminReservation extends AdminBase{
	
	/**
	@SWG\Post(
		path = "/department/Admin_Reservation/index",
		summary = "预约挂号信息列表",
		description = "预约挂号信息列表",
		tags = {"Admin/Reservation(后台/预约挂号)"},
		@SWG\Parameter(ref="#/parameters/token"),
    	@SWG\Parameter(ref="#/parameters/page"),
    	@SWG\Parameter(ref="#/parameters/start_time"),
    	@SWG\Parameter(ref="#/parameters/end_time"),
    	@SWG\Parameter(ref="#/parameters/keyword"),
    	@SWG\Response(
    		response = "200",
    		description = "预约挂号信息列表",
    		@SWG\Schema(
    			required = {"reservation"},
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
    					description = "每页显示文章数",
    				),
    				@SWG\Property(
    					property = "total",
    					type = "integer",
    					description = "医生总数",
    				),
    				@SWG\Property(
    					property = "data",
    					type = "array",
    					description = "具体数据",
    					@SWG\Items(
    						@SWG\Property(
    							property = "id",
    							type = "integer",
    							description = "主键id",
    						),
    						@SWG\Property(
    							property = "appointer",
    							type = "string",
    							description = "预约人姓名",
    						),
    						@SWG\Property(
    							property = "phone",
    							type = "string",
    							description = "预约电话",
    						),
    						@SWG\Property(
    							property = "department",
    							type = "string",
    							description = "预约科室",
    						),
    						@SWG\Property(
    							property = "doctor",
    							type = "string",
    							description = "预约医生",
    						),
    						@SWG\Property(
    							property = "appointment",
    							type = "string",
    							description = "预约时间",
    						),
    						@SWG\Property(
    							property = "remark",
    							type = "string",
    							description = "备注",
    						),
    						@SWG\Property(
    							property = "create_time",
    							type = "integer",
    							description = "创建时间",
    						),
    					),
    				),
    			),
    		),
    	),
	),
	*/
	public function index(){
		$reservationModel = new ReservationModel();
		$param = $this->request->param();
		$lists = $reservationModel->reservationList($param);
		return json($lists);
	}

	/**
	@SWG\Post(
		path = "/department/Admin_Reservation/delete",
		summary = "删除预约挂号信息",
		description = "删除预约挂号信息",
		tags = {"Admin/Reservation(后台/预约挂号)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "删除对象id",
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
		$result = ReservationModel::update(['delete_time'=>time()],['id'=>$id]);
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}


}