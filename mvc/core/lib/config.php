<?php
	namespace core\lib;
	/*
		配置文件
	*/
	class config
	{
		//定义数组
		static public $conf = array();
		static public function get($name,$file)
		{
			// p($file);exit();
			/*
			第一步：检查该配置文件是否存在
			第二步：判断配置是否存在
			第三步：如果配置存在，缓存配置文件
			*/
			if(isset(self::$conf[$file])){
				return self::$conf[$file][$name];
			} else {
				$path = XING.'\core\config\\'.$file.'.php';
				// p($path);die;
				//判断该配置文件是否存在
				if(is_file($path)){
					$conf = include $path;
					// var_dump(isset($conf[$name]));die;
					//判断配置中的是否存在值
					if(isset($conf[$name])){
						self::$conf[$name] = $conf;
						// p($conf[$name]);die;
						return $conf[$name];
					} else {
						throw new \Exception("不存在该配置项".$name);
					}
				} else {
					throw new \Exception("找不到配置文件".$file);
					
				}
			}
		}
		//数据库配置
		static public function database($file)
		{
			if(isset(self::$conf[$file])){
				return self::$conf[$file];
			} else {
				$path = XING.'\core\config\\'.$file.'.php';
				//判断该配置文件是否存在
				if(is_file($path)){
					$conf = include $path;
					self::$conf[$file] = $conf;
					return $conf;
				} else {
					throw new \Exception("找不到配置文件".$file);
				}
			}
		}
	}