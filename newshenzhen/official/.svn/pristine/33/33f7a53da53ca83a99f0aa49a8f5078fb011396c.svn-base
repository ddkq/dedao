<?php
	
	
/**
 * 根据userid换取医生信息
 */	
	
function get_user_doctor($id){
	$where = array();
	$where['status'] = array('eq',1);
	$where['post_author'] = array('eq',$id);
	
	$doctor_model= M("Doctor");
	$post=$doctor_model->where($where)->find();

	return $post;
}


/**
 * 查找医生全部问答
 */
function get_user_qa_all($id){
	$where = array();
	$where['a.isdel'] = array('eq',1);
	$where['b.author_id'] = array('eq',$id);
	
	$field = 'a.id,a.title,b.content,b.createtime,b.status';
	$limit = 8;
	
	$question_model= M("Question");
	$join = "".C('DB_PREFIX').'answer as b on b.q_id =a.id';
	$join2 = "".C('DB_PREFIX').'users as c on b.author_id =c.id';
	
	$count = $question_model->alias("a")->join($join)->join($join2)->field($field)->where($where)->count();
	$post = $question_model->alias("a")->join($join)->join($join2)->field($field)->where($where)->limit($limit)->select();
	
	$content['posts']=$post;
	$content['count']=$count;
	return $content;
	
}


/**
 * 查找医生全部被采纳问答
 */
function get_user_qa_check($id){
	$where = array();
	$where['a.isdel'] = array('eq',1);
	$where['b.author_id'] = array('eq',$id);
	$where['b.status'] = array('eq',1);
	
	$field = 'a.id,a.title,b.content,b.createtime,b.status';
	$limit = 8;
	
	$question_model= M("Question");
	$join = "".C('DB_PREFIX').'answer as b on b.q_id =a.id';
	$join2 = "".C('DB_PREFIX').'users as c on b.author_id =c.id';
	
	$count = $question_model->alias("a")->join($join)->join($join2)->field($field)->where($where)->count();
	$post=$question_model->alias("a")->join($join)->join($join2)->field($field)->where($where)->limit($limit)->select();
	
	$content['posts']=$post;
	$content['count']=$count;
	return $content;
	

}
