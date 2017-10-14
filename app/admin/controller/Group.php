<?php
namespace app\admin\controller;
use think\Db;
/**
* 
*/
class Group extends Home
{
	protected $db_rule;

	protected function before()
	{
		$this->db_rule = Db::name('auth_rule');
	
	}

	public function index()
	{
		$this->data['rules'] = $this->db_rule->where(['status'=>1])->select();
		return $this->fetch('system/group',$this->data);
	}

}