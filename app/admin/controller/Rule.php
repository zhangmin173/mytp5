<?php
namespace app\admin\controller;
/**
* 
*/
class Rule extends Home
{
	protected $db_note;

	protected function before()
	{
		$this->db_note = model('note');
	
	}

	public function index()
	{
		
		return $this->fetch('system/rule',$this->data);
	}

}