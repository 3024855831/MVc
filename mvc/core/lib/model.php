<?php
namespace core\lib;
/**
* 模型类
*/
use core\lib\config;

class model extends \medoo
{
	function __construct()
	{
		//链接数据库
		$option = config::database('database');
		parent::__construct($option);
		// $database = config::database('database');
		// // p($temp);
		// try{
		// 	parent::__construct($database['DSN'],$database['USERNAME'],$database['PASSWD']);
		// } catch (\PDOException $e){
		// 	p($e->getMessage());
		// }
	}
}