<?php
namespace app\admin\model;
use app\common\model\BaseModel;
use think\Route;

/**
* 路由模型类
*/
class RouteModel extends BaseModel{

	protected $table = 'cmf_route';

	public function getRoute(){

		$routes = $this->where('status',1)->select();

		$allRoutes = '';

		foreach ($routes as $key => $value) {
			$value = json_decode($value,true);
			$path = explode("/", $value['full_url']);
            if (count($path) < 3) {//必须是完整 url
                continue;
            }
            $allRoutes .= "Route::rule('".$value['url']."','".$value['full_url']."');\n";
		}
		$route_file = APP_PATH . "route.php";
       	file_put_contents($route_file, "<?php\nuse think\Route;\n" . stripslashes($allRoutes));

	}

}