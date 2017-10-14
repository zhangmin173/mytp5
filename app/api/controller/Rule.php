<?php
namespace app\api\controller;
use think\Db;
/**
* 
*/
class Rule extends Api
{
	protected $db_rule;

	protected function base()
	{
		$this->db_rule = Db::name('auth_rule');
	
	}

	public function index()
	{
		$d = input();
		$page = $d['page']?$d['page']:1;
		$limit = $d['limit']?$d['limit']:10;

		$map = [];
		if (isset($d['title'])) {
			$map['title'] = ['like','%'.$d['title'].'%'];
		}
		
		$rows = $this->db_rule->page($page,$limit)->where($map)->order('id desc')->select();
		$total = $this->db_rule->where($map)->count();

		$this->data['data'] = $rows;
		$this->data['count'] = $total;
		return $this->ajax_return($this->data);
	}

	public function save()
	{
		$d = input();
		$d['status'] = input('status')?1:0;
		
		if (!isset($d['id']) || empty($d['id'])) {
			$res = $this->db_rule->insert($d);
			$this->data['data'] = $res;
			if ($res) {
				$this->data['msg'] = '添加成功';
			} else {
				$this->data['code'] = 1;
				$this->data['msg'] = '添加失败';
			}
		} else {
			$this->data['data'] = $d;
			$res = $this->db_rule->update($d);
			if ($res) {
				$this->data['msg'] = '更新成功';
			} else {
				$this->data['code'] = 1;
				$this->data['msg'] = '更新失败';
			}
		}
		
		return $this->ajax_return($this->data);
	}

	public function del()
	{
		$id = input('id');
		$ids = str2arr($id);
		$data = [];

		foreach ($ids as $value) {
			$i = $this->db_rule->delete($value);
			if ($i == 1) {
				array_push($data,$value);
			}
		}
		
		$this->data['data'] = $data;
		return $this->ajax_return($this->data);
	}

}