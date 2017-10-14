<?php
namespace app\admin\controller;
/**
* 
*/
class Login extends Base
{
	protected $db_user;

	protected function base()
	{
		$this->db_user = model('user');
	}

	public function index()
	{
		//dump($this->data);exit;
		return $this->fetch('index',$this->data);
	}

	public function register()
	{
		$mobile = input('mobile');
		$name = input('name');
		$oauth_info = $this->getOauthInfo();

		if ($this->isOpenidExist($oauth_info['openid'])) {
			return $this->error('您的微信已注册',null,$this->data);
		}

		if ($this->isMobileExist($mobile)) {
			return $this->error('手机号已被注册',null,$this->data);
		}

		$d = $oauth_info;
		$d['name'] = $name;
		$d['mobile'] = $mobile;
		$d['password'] = md5('123456');

		$result = $this->validate($d,'User.register');
		if(true !== $result){
			return $this->error($result,null,$this->data);
		}

		$res = $this->db_user->allowField(true)->create($d);
		//dump($res);exit;
		$user_info = $this->db_user->get($res['id']);
		if ($user_info) {
			$this->setUserInfo($user_info);
			return $this->success('注册成功并登录',null,$this->data);
		}
		return $this->error('注册失败',null,$this->data);
	}

	protected function isOpenidExist($openid)
	{
		return $this->db_user->where(['openid'=>$openid])->find();
	}

	protected function isMobileExist($mobile)
	{
		return $this->db_user->where(['mobile'=>$mobile])->find();
	}
}