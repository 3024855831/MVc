<?php
/**
* 定义路由
*/
namespace core\lib;

//路由类
class route
{
	public function __construct()
	{
		/*
		隐藏index.php
		返回对应控制器和方法
		获取URL 参数部分
		*/
		if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/')
		{
			$path = $_SERVER['REQUEST_URI'];
			$patharr = explode('/',trim($path,'/'));
			// p($patharr);die;
			//判断控制器
			if(isset($patharr[0])){
				$this->ctrl = $patharr[0];
			}
			unset($patharr[0]);
			// } else {
			// 	$this->ctrl = 'index';
			// }
			//判断方法
			if(isset($patharr[1])){
				$this->action = $patharr[1];
			} else {
				$this->action = 'index';
			}
			$count = count($patharr)+2;
			$i = 2;
			while ($i < $count) {
				if(isset($patharr[$i+1])){
					$_GET[$patharr[$i]] = $patharr[$i+1];
				}
				$i = $i + 2;
			}
			unset($_GET['url']);
			// p($_GET);die;
			// if(isset($patharr[3])){
			// 	$this->ctrl = $patharr[3];
			// } else {
			// 	$this->ctrl = 'index';
			// }
			// //判断方法
			// if(isset($patharr[4])){
			// 	$this->action = $patharr[4];
			// } else {
			// 	$this->action = 'index';
			// }
			//获取url的长度
			// $count = count($patharr);
			// // p($patharr);
			// // echo $count;die;
			// $i = 5;
			// //获取除控制器和方法 多余的属性 值
			// while ($i < $count) {
			// 	if(isset($patharr[$i+1])){
			// 		$_GET[$patharr[$i]] = $patharr[$i+1];
			// 	}
			// 	$i = $i + 2;
			// }
			// p($_GET);
		} else {
			$this->ctrl = 'index';
			$this->action = 'index';
		}
	}
}