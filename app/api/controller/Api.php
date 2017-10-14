<?php
namespace app\api\controller;
use think\Controller;
/**
* 
*/
class Api extends Controller
{
	protected $data;
	// 初始化
	protected function _initialize()
	{
		$this->data['code'] = 0;
		$this->data['msg'] = '执行成功';

		$this->base();
	}

	// 基础操作
	protected function base()
	{
		
	}

	// 数据返回
	protected function ajax_return($data) {
		return json($data);
	}

}