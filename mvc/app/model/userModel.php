<?php
 namespace app\model;
 /*
 模型
 */
 use core\lib\model;

 class userModel extends model{
	//表名
	public $table = "user";
 	//查询
 	public function lists(){
 		$data = $this->select($this->table,'*');
		// $model = new \core\lib\model();
		// $sql = "select * from user";
		// $model->query('set names utf8;');
		// $res = $model->query($sql);
		// $data = $res->fetchAll();
		return $data;
 	}
 }