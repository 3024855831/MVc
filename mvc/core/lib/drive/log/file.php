<?php
namespace core\lib\drive\log;
//日志存到文件中
/**
* 
*/
use core\lib\config;
class file
{
	//存储位置
	public $path;
	//初始化
	public function __construct()
	{
		$conf = config::get('OPTION','log');
		// p($conf);die;
		$this->path = $conf['PATH'];
	}
	//写日志
	public function log($message,$file = 'log')
	{
		/*
		*第一步：确定存储位置是否存在（不存在新建目录）
		*第二步：写入日志
		*/
		if(!is_dir($this->path.date('YmdH')))
		{
			mkdir($this->path.date('YmdH'),'0777',true);
		}
		//写入
		// p($this->path.date('YmdH').'/'.$file.'.php');die;
		return file_put_contents($this->path.date('YmdH').'/'.$file.'.php', date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
		// p($message);
	}
}