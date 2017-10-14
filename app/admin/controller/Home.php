<?php
namespace app\admin\controller;
/**
* 
*/
class Home extends Base
{
	// 权限控制
	protected function base()
	{
		// 是否登录
		if (!$this->_global['user_info']) {
			return $this->redirect('login/index');
		}

		$this->before();
	}

	// 前置操作
	protected function before()
	{
		
	}

}