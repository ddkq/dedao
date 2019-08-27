<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use app\admin\model\AdminMenuModel;
use redis\Redis;


/**
* 公共类
*/		
class Publics extends AdminBase{

    /**
     * 删除文件
     * @return json
     */
    public function destoryFile(){
    	$file = $this->request->param('image');
    	if(destory_file($file)){
    		$this->info(1,'文件删除成功');
    	}else{
    		$this->info(0,'文件删除失败');
    	}
    }

    /**
    @SWG\Post(
        path = "/admin/Publics/getMenuBar",
        summary = "后台左侧菜单条",
        description = "后台左侧菜单条",
        tags = {"Admin/Index(后台/公共接口)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Response(
            response = "200",
            description = "后台左侧菜单条",
            @SWG\Schema(
                required = {"menu_bar"},
                type = "array",
                @SWG\Items(
                    @SWG\Property(
                        property = "title",
                        type = "string",
                        description = "后台菜单名称",
                    ),
                    @SWG\Property(
                        property = "url",
                        type = "string",
                        description = "前端组件名称",
                    ),
                    @SWG\Property(
                        property = "icon",
                        type = "string",
                        description = "后台菜单图标",
                    ),
                    @SWG\Property(
                        property = "secondTitle",
                        type = "array",
                        @SWG\Items(),
                        description = "后台菜单子类数组",
                    ),
                ),
            ),
        ),
    ),
    */
    public function getMenuBar(){
        $adminMenuModel = new AdminMenuModel();
        $menu = $adminMenuModel->menuBar();
        return json(array_values($menu));
    }

}








