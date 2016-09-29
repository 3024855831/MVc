<?php
namespace core\lib;
/**
* 日志类
*/
use core\lib\config;

class log
{
	static $class;
	/**
	*第一步：确定日志存储的方式
	*第二步：写日志	
	*/
	static public function init()
	{
		$drive = config::get('DRIVE','log');
		$class = '\\core\lib\drive\log\\'.$drive;
		self::$class = new $class;
	}
	//
	static public function log($name,$file = 'log')
	{
		self::$class->log($name,$file);
	}
}