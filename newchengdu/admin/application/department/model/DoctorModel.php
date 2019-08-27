<?php
namespace app\department\model;
use app\common\model\BaseModel;
use think\Db;

/**
* 医生模型
*/
class DoctorModel extends BaseModel{

	protected $table = 'cmf_doctor';

	protected $autoWriteTimestamp = true;

	protected $type = [
        'published_time'    =>  'timestamp',
    ];

    //插入时给working_time添加默认值
    protected $insert = ['working_time' => '[{"am":false,"pm":false},{"am":false,"pm":false},{"am":false,"pm":false},{"am":false,"pm":false},{"am":false,"pm":false},{"am":false,"pm":false},{"am":false,"pm":false}]'];

	//多对多关联
	public function department(){
        return $this->belongsToMany('DepartmentModel','department_relationships','department_id','doctor_id');
    }

    //格式化医生介绍内容
    public function setDoctorIntroductionAttr($value){
        return htmlspecialchars_decode($value);
    }

    //格式化医生介绍内容
    public function setDoctorProficientAttr($value){
        return htmlspecialchars_decode($value);
    }

    //获取时格式化排版时间
    public function getWorkingTimeAttr($value){
        return json_decode($value,true);
    }

    //获取时格式化缩略图
    public function getThumbAttr($value){
    	return json_decode($value,true);
    }

    //获取时格式化更多信息
    public function getMoreAttr($value){
    	return json_decode($value,true);
    }



    //获取医生列表
	public function DoctorList($param){
		
		//判断是否搜索
		$search = 0;
		$where = [];
		$where['r.status'] = 1;

		if(!empty($param['department'])){
			$where['r.department_id'] = intval($param['department']);
		}
		if(!empty($param['start_time'])){
			$where['published_time'] = ['>=', strtotime($param['start_time'])];
		}
		if(!empty($param['end_time'])){
			$where['published_time'] = ['<=', strtotime($param['end_time'])];
		}
		if(!empty($param['keyword'])){
			$where['doctor_name'] = ['like','%'.$param['keyword'].'%'];
		}

		$join = [
		    ['cmf_department_relationships r','a.id = r.doctor_id'],
		    ['cmf_user u','a.doctor_author = u.id'],
		    ['cmf_department d','r.department_id = d.id'],
		];

		$doctors = $this->alias('a')->join($join)->field('a.*,r.list_order,r.id as rid,d.id as department_id,d.name as department,u.user_login as doctor_author')->where($where)->order('r.list_order')->paginate(10);

		return $doctors;

	}

	//添加医生
	public function DoctorAddPost($data){

		$data['doctor_author'] = cmf_get_current_admin_id();
		$department = $data['department_id'];

		$this->allowField(true)->data($data, true)->isUpdate(false)->save();
		$this->department()->save($department);
		return $this;
	}

	//修改医生
	public function DoctorEditPost($data){
		
		$department = $data['department_id'];

		$this->allowField(true)->data($data, true)->isUpdate(true)->save();

		$old_department = $this->department()->value('department_id');

		if($department != $old_department){
			$this->department()->detach($old_department);
			$this->department()->save($department);
		}
		return $this;

	}
}