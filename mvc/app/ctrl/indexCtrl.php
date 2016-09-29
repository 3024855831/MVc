<?php
namespace app\ctrl;

use core\lib\model;
//为了防止类名与方法名重复 我们在类名 后面+Ctrl
class indexCtrl extends \core\xing
{
	public function index(){
		$temp = \core\lib\config::get('CTRL','route');
		p($temp);
		// p('it is index');
		//实例化模型类
		// $data = "Hello World";
		$model = new \app\model\userModel();
		$data = $model->lists();
		// dump($data);die;
		$this->assign('data',$data);
		$this->display('index.html');
	}
}