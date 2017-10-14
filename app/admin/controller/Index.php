<?php
namespace app\admin\controller;
/**
* 
*/
class Index extends Home
{
	protected $db_note;

	protected function before()
	{
		$this->db_note = model('note');
	
	}

	public function index()
	{
		//dump(request());
		$this->data['msg'] = 'hello';
		// dump(cache('name'));
		// cache('name', 'zhangmin','user_name');
		// cache('name',NULL);
		dump($this->data);
		
		//return $this->fetch($this->_tpl.'index/index',$this->data);
	}

	public function upload()
	{
		return $this->fetch($this->_tpl.'index/upload',$this->data);
	}

	public function save()
	{
		$d['uid'] = $this->getUserInfo()['id'];
		$d['title'] = input('title');
		$d['content'] = input('content');
		$d['img'] = input('img');

		$res = $this->db_note->allowField(true)->create($d);
		if ($res) {
			return $this->success('发布成功',null,$this->data);
		}
		return $this->error('发布失败',null,$this->data);
	}

	public function page()
	{
		$limit = input('limit')?input('limit'):10;
		$offset = input('offset')?input('offset'):0;
		$map['status'] = input('status');

		$total = $this->db_note->count();
		$data = $this->db_note->where($map)->limit($offset,$limit)->select();

		return json(['ret'=>0,'data'=>$data,'total'=>$total]);
	}
}