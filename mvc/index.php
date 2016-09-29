<?php
/*
入口文件
*/
//当前根目录
define('XING', realpath('./'));
//定义核心文件
define('CORE', XING.'/core');
//定义项目文件
define('APP', XING.'/app');
//定义模块
define('MODULE', 'app');
//是否开启调式
define('DEBUG', true);
//引入第三方类
include "vendor/autoload.php";
if(DEBUG){
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	ini_set('display_error', 'On');
}else{
	ini_set('display_error','Off');
}
//自定义类
include CORE.'/common/function.php';
//核心文件
include CORE.'/xing.php';
//自动加载类
spl_autoload_register('\core\xing::load');
//启动框架
\core\xing::run();