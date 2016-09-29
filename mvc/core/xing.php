<?php
	namespace core;
	class xing
	{
		//定义数组
		public static $classMap = array();
		public $assign;
		//加载控制器
		static public function run(){
			//启动日志
			\core\lib\log::init();
			//实例化路由类
			$route = new \core\lib\route();
			//加载控制器及方法
			$ctrlClass = $route->ctrl;
			$action = $route->action;
			$ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
			$cltrlClass = "\\".MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
			//判断该方法是否存在
			// p($ctrlfile);die;
			if(is_file($ctrlfile)){
				include $ctrlfile; 
				// $ctrl = new \app\ctrl\indexctrl;
				$ctrl = new $cltrlClass;
				$ctrl->$action();
				//写入日志
				\core\lib\log::log('ctrl:'.$ctrlClass.'action:'.$action);
			} else {
				throw new \Exception("找不到控制器".$ctrlfile);
			}
			// p($route);
		}
		//自动加载类
		static public function load($class){
			//判断是否在这个数组中
			if(isset($classMap,$class)){
				//如果在说明已经引入
				return true;
			} else {
				//不在上面定义的数组中
				$class = str_replace('\\', '/', $class);
				//拼接成一个文件名
				$file = XING.'/'.$class.'.php';
				//判断是否为一个文件
				if(is_file($file)){
					//如果是，引入该文件并加入上面定义的数组中
					include $file;
					self::$classMap[$class] = $class;
				} else {
					return false;
				}
			}
		}
		//传值
		public function assign($name,$value){
			$this->assign[$name] = $value; 
		}
		//视图
		public function display($file){
			$file = APP.'/view/'.$file;
			if(is_file($file)){
				// extract($this->assign);
				// include $file;
				\Twig_Autoloader::register();

				$loader = new \Twig_Loader_Filesystem(APP.'/view');
				$twig = new \Twig_Environment($loader, array(
				    'cache' => '/path/to/compilation_cache',
				    'debug' => DEBUG
				));
				$template = $twig->loadTemplate('index.html');
				$template->display($this->assign?$this->assign:array());
			}
		}
	}