<?php
namespace Swt\Controller;
use Common\Controller\HomebaseController;
class IndexController extends HomebaseController {
	public function index() {
		$this->display(":index");
	}
}