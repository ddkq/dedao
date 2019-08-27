<?php
namespace app\admin\model;
use app\common\model\BaseModel;
use tree\Tree;

class AdminMenuModel extends BaseModel{

    protected $table = 'cmf_admin_menu';

    
    protected static function init(){
        //写入path路径
        AdminMenuModel::event('after_write',function($menu){
            if($menu->parent_id == 0){
                $path = $menu->id;
            }else{
                $path = AdminMenuModel::where('id',$menu->parent_id)->value('path');
                $path = $path.','.$menu->id;
            }
            AdminMenuModel::where('id',$menu->id)->update(['path'=>$path]);
        });
    }

    
    /**
     * 后台菜单列表数据
     * @return array
     */
	public function menuList(){



        if(empty(cache('admin_menus_by_'.parent::$db_id))){
            $result = $this->order('list_order','ASC')->field('id,id as value,parent_id,name as label,path,status,list_order,url,app,controller,action,icon')->select();

            $tree = new Tree();
            $tree->init($result);
            $menu = $tree->getTree2(0);
            
            cache('admin_menus_by_'.parent::$db_id,$menu);
        }else{
            $menu = cache('admin_menus_by_'.parent::$db_id);
        }
        return $menu;
	}


    public function menuTree(){
        if(empty(cache('admin_menus_tree_by_'.parent::$db_id))){

            $result = $this->order('list_order','ASC')->field('id,id as value,path,parent_id,name as label,status')->select();

            $tree = new Tree();
            $tree->init($result);
            $menu = $tree->getTreeArray(0);
            
            cache('admin_menus_tree_by_'.parent::$db_id,$menu);
        }else{
            $menu = cache('admin_menus_tree_by_'.parent::$db_id);
        }
        return $menu;
    }



    /**
     * 生成后台左侧导航
     * @return array
     */
	public function menuBar(){
		$admin_id = cmf_get_current_admin_id();
        if(empty(cache("admin_menus_$admin_id".'_by_'.parent::$db_id))){
            $result  = $this->where('status','1')->order('list_order','ASC')->field('id,parent_id,name as title,app,controller,action,icon,url')->select();
            if($admin_id != 1){
                foreach ($result as $key => $value) {
                    $ruleName = strtolower($value['app']."/".$value['controller']."/".$value['action']);
                    if(!cmf_auth_check($admin_id,$ruleName)){
                        unset($result[$key]);
                    }
                }
            }


            $tree = new Tree();
            $tree->init($result);
            $treeStr = $tree->getTreeArray(0);


            $menu = [];
            foreach ($treeStr as $key => $value) {
                $menu[$key]['title'] = $value['title'];
                $menu[$key]['url'] = 0;
                $menu[$key]['icon'] = $value['icon'];
                if(!empty($value['children'])){
                    $i = 0;
                    foreach ($value['children'] as $v1) {
                        $menu[$key]['secondTitle'][$i]['title'] = $v1['title'];
                        $menu[$key]['secondTitle'][$i]['url'] = $v1['url'];
                        $menu[$key]['secondTitle'][$i]['icon'] = $v1['icon'];
                        if(!empty($v1['children'])){
                            $j = 0;
                            foreach ($v1['children'] as $v2) {
                                $menu[$key]['secondTitle'][$i]['secondTitle'][$j]['title'] = $v2['title'];
                                $menu[$key]['secondTitle'][$i]['secondTitle'][$j]['url'] = $v2['url'];
                                $menu[$key]['secondTitle'][$i]['secondTitle'][$j]['icon'] = $v2['icon'];
                                $j++;
                            }
                        }else{
                            $menu[$key]['secondTitle'][$i]['secondTitle'] = 0;
                        }
                        $i++;
                    }
                }else{
                    $menu[$key]['secondTitle'] = 0;
                }
            }
            cache("admin_menus_$admin_id".'_by_'.parent::$db_id, $menu);
        }else{
            $menu = cache("admin_menus_$admin_id".'_by_'.parent::$db_id);
        }

		return $menu;
	}


}