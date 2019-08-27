<?php
namespace app\questionnaire\model;
use app\common\model\BaseModel;
use app\questionnaire\model\QuestionnaireDataModel;

/**
* 问卷模型
*/
class QuestionnaireModel extends BaseModel{
	
	protected $table = 'cmf_questionnaire';

	protected $type = [
		'content' 		=> 	'json',
		'create_time' 	=> 	'timestamp',
	];

	protected $updateTime = false;

	//获取问卷列表
	public function questionnaireList($param){

		$where = [];
		$where['delete_time'] = 0;
		if(!empty($param['start_time']) && !empty($param['end_time']) ){
			$where['create_time'] = [['>=',strtotime($param['start_time'])],['<=',strtotime($param['end_time'])+86400]];
		}
		if(!empty($param['keyword'])){
			$where['questionnaire_title'] = ['like','%'.$param['keyword'].'%'];
		}

		$lists = $this->where($where)->order('create_time desc')->paginate(10);

		return $lists;
	}


	//查看数据
	public function viewData($id){
		$content = $this->where('id',$id)->value('content');
		$content = json_decode($content,true);
		$data = QuestionnaireDataModel::all(['questionnaire_id'=>$id]);
		$data = collection($data)->toArray();
		foreach ($data as $data_key => $data_value) {
			$data_content = $data_value['content'];
			foreach ($data_content as $key_data => $value_data) {
				$heading = $value_data['name'];
				$children = $value_data['value'];
				$content[$heading-1]['children'][$children]['subtotal'] += 1;
			}
		}

		foreach ($content as $key => $value) {
			$children = $value['children'];
			$sum = 0;
			foreach ($children as $key_child => $value_child) {
				$sum += $value_child['subtotal'];
			}
			foreach ($children as $key_child => $value_child) {
				$content[$key]['children'][$key_child]['proportion'] = intval($value_child['subtotal']/$sum*100).'%';
				unset($content[$key]['is_must']);
			}

		}

		return $content;
	}






	//交叉分析
	public function analysisData($param){
		$id = $param['id'];
		$returnArr = [];
		
		//获取选项
		$content = $this->where('id',$id)->value('content');
		$content = json_decode($content,true);
		//获取选项数据
		$data = QuestionnaireDataModel::all(['questionnaire_id'=>$id]);
		$data = collection($data)->toArray();
		if($param['x2'] == -1 && $param['y2'] == -1){
			$x = $param['x'];
			$y = $param['y'];

			$x_children = $content[$x]['children'];
			$y_children = $content[$y]['children'];

			//生成数组结构
			$returnArr[0]['title'][0] = 'x/y';
			foreach ($x_children as $x_key => $x_value) {
				$returnArr[0]['data'][$x_key][0] = $x_value['name'];
				foreach ($y_children as $y_key => $y_value) {
					$returnArr[0]['title'][$y_key+1] = $y_value['name'];
					$returnArr[0]['data'][$x_key][$y_key+1] = 0;
				}
			}
			array_push($returnArr[0]['title'],'合计');
			//获取数据
			foreach ($data as $data_key => $data_value) {
				$data_content = $data_value['content'];
				foreach ($data_content as $key_x => $value_x) {
					if($value_x['name'] == $x+1){
						foreach ($data_content as $key_y => $value_y) {
							if($value_y['name'] == $y+1){
								$returnArr[0]['data'][intval($value_x['value'])][intval($value_y['value'])+1] +=1;
							}
						}
					}
				}
			}
			//统计数据
			for ($i=0; $i < count($returnArr[0]['data']); $i++) { 
				$sumArr = $returnArr[0]['data'][$i];
				unset($sumArr[0]);
				$sum = array_sum($sumArr);
				for ($j=1; $j < count($returnArr[0]['data'][$i]); $j++) { 
					$returnArr[0]['data'][$i][$j] = intval($returnArr[0]['data'][$i][$j]/$sum*100)."%";
				}
				array_push($returnArr[0]['data'][$i],$sum);
			}
		}
		else if($param['x2'] == -1 && $param['y2'] != -1){
			$x = $param['x'];
			$y = $param['y'];
			$y2 = $param['y2'];

			$x_children = $content[$x]['children'];
			$y_children = $content[$y]['children'];
			$y2_children = $content[$y2]['children'];

			//生成数组结构
			$returnArr[0]['title'][0] = 'x/y';
			$returnArr[1]['title'][0] = 'x2/y2';
			$i = 0;
			foreach ($x_children as $x_key => $x_value) {
				$returnArr[0]['data'][$i][0] = $x_value['name'];
				$returnArr[1]['data'][$i][0] = $x_value['name'];
				foreach ($y_children as $y_key => $y_value) {
					$returnArr[0]['title'][$y_key+1] = $y_value['name'];
					$returnArr[0]['data'][$i][$y_key+1] = 0;
				}
				foreach ($y2_children as $y2_key => $y2_value) {
					$returnArr[1]['title'][$y2_key+1] = $y2_value['name'];
					$returnArr[1]['data'][$i][$y2_key+1] = 0;
				}
				$i++;
			}
			array_push($returnArr[0]['title'],'合计');
			array_push($returnArr[1]['title'],'合计');
			//获取数据
			$x2_length = count($x2_children);
			foreach ($data as $data_key => $data_value) {
				$data_content = $data_value['content'];
				foreach ($data_content as $key_x => $value_x) {
					if($value_x['name'] == $x+1){
						foreach ($data_content as $key_y => $value_y) {
							if($value_y['name'] == $y+1){
								$returnArr[0]['data'][intval($value_x['value'])][intval($value_y['value'])+1] +=1;
							}
							if($value_y['name'] == $y2+1){
								$returnArr[1]['data'][intval($value_x['value'])][intval($value_y['value'])+1] +=1;
							}
						}
					}
				}
			}
			//统计数据
			for ($i=0; $i < count($returnArr[0]['data']); $i++) { 
				$sum = array_sum($returnArr[0]['data'][$i]);
				for ($j=1; $j < count($returnArr[0]['data'][$i]); $j++) { 
					$returnArr[0]['data'][$i][$j] = intval($returnArr[0]['data'][$i][$j]/$sum*100)."%";
				}
				array_push($returnArr[0]['data'][$i],$sum);
			}
			for ($i=0; $i < count($returnArr[1]['data']); $i++) { 
				$sum = array_sum($returnArr[1]['data'][$i]);
				for ($j=1; $j < count($returnArr[1]['data'][$i]); $j++) { 
					$returnArr[1]['data'][$i][$j] = intval($returnArr[1]['data'][$i][$j]/$sum*100)."%";
				}
				array_push($returnArr[1]['data'][$i],$sum);
			}
		}else{
			$x = $param['x'];
			$x2 = $param['x2'];
			$y = $param['y'];
			$y2 = $param['y2'];

			$x_children = $content[$x]['children'];
			$x2_children = $content[$x2]['children'];
			$y_children = $content[$y]['children'];
			$y2_children = $content[$y2]['children'];

			//生成数组结构
			$returnArr[0]['title'][0] = 'x/y';
			$returnArr[1]['title'][0] = 'x2/y2';
			$i = 0;
			foreach ($x_children as $x_key => $x_value) {
				foreach ($x2_children as $x2_key => $x2_value) {
					$returnArr[0]['data'][$i][0] = $x_value['name'].'/'.$x2_value['name'];
					$returnArr[1]['data'][$i][0] = $x_value['name'].'/'.$x2_value['name'];
					foreach ($y_children as $y_key => $y_value) {
						$returnArr[0]['title'][$y_key+1] = $y_value['name'];
						$returnArr[0]['data'][$i][$y_key+1] = 0;
					}
					foreach ($y2_children as $y2_key => $y2_value) {
						$returnArr[1]['title'][$y2_key+1] = $y2_value['name'];
						$returnArr[1]['data'][$i][$y2_key+1] = 0;
					}
					$i++;
				}
			}
			array_push($returnArr[0]['title'],'合计');
			array_push($returnArr[1]['title'],'合计');
			//获取数据
			$x2_length = count($x2_children);
			foreach ($data as $data_key => $data_value) {
				$data_content = $data_value['content'];
				foreach ($data_content as $key_x => $value_x) {
					if($value_x['name'] == $x+1){
						foreach ($data_content as $key_x2 => $value_x2) {
							if($value_x2['name'] == $x2+1){
								$key = intval($value_x2['value']);
								foreach ($data_content as $key_y => $value_y) {
									if($value_x['value'] != 0){
										$key = intval($value_x['value']) * $x2_length + intval($value_x2['value']);
									}
									if($value_y['name'] == $y+1){
										$returnArr[0]['data'][$key][intval($value_y['value'])+1] +=1;
									}
									if($value_y['name'] == $y2+1){
										$returnArr[1]['data'][$key][intval($value_y['value'])+1] +=1;
									}
								}
							}
						}
					}
				}
			}
			//统计数据
			for ($i=0; $i < count($returnArr[0]['data']); $i++) { 
				$sum = array_sum($returnArr[0]['data'][$i]);
				for ($j=1; $j < count($returnArr[0]['data'][$i]); $j++) { 
					$returnArr[0]['data'][$i][$j] = intval($returnArr[0]['data'][$i][$j]/$sum*100)."%";
				}
				array_push($returnArr[0]['data'][$i],$sum);
			}
			for ($i=0; $i < count($returnArr[1]['data']); $i++) { 
				$sum = array_sum($returnArr[1]['data'][$i]);
				for ($j=1; $j < count($returnArr[1]['data'][$i]); $j++) { 
					$returnArr[1]['data'][$i][$j] = intval($returnArr[1]['data'][$i][$j]/$sum*100)."%";
				}
				array_push($returnArr[1]['data'][$i],$sum);
			}
		}

		
		return $returnArr;
	}


}