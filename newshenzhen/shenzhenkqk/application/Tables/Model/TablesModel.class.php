<?php
namespace Tables\Model;
use Think\Model\RelationModel;
class TablesModel extends RelationModel {

	protected $_link = array(
		'num'  => array(    
			'mapping_type'  => self::HAS_MANY,    
			'class_name'    => 'tables_data',    
			'foreign_key'   => 'tables_id', 
		),
		'updata_time' => array(
			'mapping_type'      => self::HAS_MANY,
			'class_name'        => 'tables_data',
			'foreign_key'   => 'tables_id',
			'mapping_fields'	=> 'createtime',
			'mapping_order' => 'createtime desc'
		),

	);

	protected $_validate = array(
		//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
		array('name', 'require', '表单名字不能为空！', 1, 'regex',1 ),
		array('name','','表单已经存在！',0,'unique',1), 
	);

	/*protected function _after_insert($data) {
		$Model= M();
		$table_name = $data['name_bytable'];
		$content = json_decode($data['content'],true);
		array_pop($content);

		$sql = "DROP TABLE IF EXISTS `cmf_$table_name`;";
		$sql .= "CREATE TABLE `cmf_$table_name`  (
		  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,";

		//var_dump($data);exit;

		foreach ($content as $key => $value) {
			if(in_array(intval($value['type']), array(1,2,3,8,11,12))){
				$type = 'varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci';
			}else if(in_array(intval($value['type']), array(4,5,7,10))){
				$type = 'int(10)';
			}else if(intval($value['type']) == 6){
				$type = 'datetime(0)';
			}else if(intval($value['type']) == 9){
				$type = 'varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci';
			}

			$is_null = $value['is_null'] == 0?' NOT NULL':'';

			$sql .= "`".pinyin($value['name'])."`".$type.$is_null."  COMMENT '".$value['name']."',";
		}

		$sql .= "
			`page` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '当前页',
			`ip` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ip',
			`createtime` datetime(0) NOT NULL COMMENT '创建时间',
			  PRIMARY KEY (`id`) USING BTREE
			) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;
			SET FOREIGN_KEY_CHECKS = 1;";

		  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '表单名字（自定义）',
		  `name_bytable` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '对应数据表名字',
		  `data_num` int(10) NOT NULL DEFAULT 0 COMMENT '收集数据数',
		  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '具体内容json格式',
		  `page` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '当前页',
		  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否启用（1启用，0关闭',
		var_dump($sql);exit;
		$list = $Model -> execute($sql);
		
	}*/

}