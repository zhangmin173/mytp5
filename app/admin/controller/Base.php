<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use auth\Auth;
/**
* 
*/
class Base extends Controller
{
	protected $site_info; // 站点信息
	protected $jsapi_config; // 微信配置信息
	protected $soure_info; // 资源信息
	protected $url; // url信息

	protected $oauth_info; // 用户微信信息
	protected $user_info; // 用户登录信息
	protected $access_token; // 用户登录token

	protected $_global;
	protected $_tpl;

	protected $data;
	

	// 初始化
	protected function _initialize()
	{
		$this->_global['site_info'] = $this->getSiteInfo();		
		$this->_global['jsapi_config'] = $this->getJsapiConfig();
		$this->_global['soure_info'] = $this->getSoureInfo();
		$this->_global['url'] = $this->getUrl();

		$this->_global['oauth_info'] = $this->getOauthInfo();
		$this->_global['user_info'] = $this->getUserInfo();
		$this->_global['access_token'] = $this->getAccessToken();
		
		
		$this->data['_global'] = $this->_global;
		// 模板输出位置
		$this->_tpl = $this->getV();
		config([
			'dispatch_success_tmpl' => $this->_tpl . 'public/dispatch_jump',
			'dispatch_error_tmpl'=> $this->_tpl . 'public/dispatch_jump'
		]);

		// 是否授权
		if (is_null($this->_global['oauth_info'])) {
			return $this->redirect('weixin/index');
		}

		$this->base();
		$auth = new Auth();
	}

	// 基础操作
	protected function base()
	{
		
	}

	// 获取站点信息
	protected function getSiteInfo() {
		$this->site_info = [
			'site_name' => '站点名称',
			'site_title' => '我的网站'
		];
		return $this->site_info;
	}

	// 获取微信配置信息
	protected function getJsapiConfig()
	{
		$this->jsapi_config = [];
		return $this->jsapi_config;
	}

	// 获取资源信息
	protected function getSoureInfo()
	{
		$modules = request()->dispatch()['module'];
		$module['m'] = $modules[0]?$modules[0]:'index';
		$module['c'] = $modules[1]?$modules[1]:'index';
		$module['a'] = $modules[2]?$modules[2]:'index';
		$this->soure_info['module'] = $module;
		return $this->soure_info;
	}

	// 其他url信息
	protected function getUrl()
	{
		$this->url['site_url'] = request()->domain().request()->root();
		$this->url['pre_url'] = request()->server('HTTP_REFERER');
		$this->url['front_url'] = $this->url['site_url'].'/public/'.request()->dispatch()['module'][0].$this->getV();
		$this->url['public_url'] = $this->url['site_url'].'/public';
		$this->url['api'] = $this->url['site_url'].'/api/';
		$this->url['home'] = $this->url['site_url'].'home/';
		return $this->url;
	}

	// 获取用户微信信息
	protected function getOauthInfo()
	{
		$this->oauth_info = ['openid'=>'testopenid','headimg'=>'','nickname'=>'阿敏','sex'=>2];
		return $this->oauth_info;
	}

	// 获取用户登录信息
	protected function getUserInfo()
	{
		if (session('user_info')) {
			return session('user_info');
		} elseif ($this->oauth_info) {
			$this->user_info = Db::name('user')->where(['openid'=>$this->oauth_info['openid']])->find();
			if ($this->user_info) {
				$this->setUserInfo($this->user_info);
				return $this->user_info;
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	// 用户登录access_token
	protected function getAccessToken()
	{
		$this->access_token = '123456';
		$this->setUserToken($this->access_token);
		return $this->access_token;
	}

	// 设置用户登录信息
	protected function setUserInfo($user_info)
	{
		session('user_info',$user_info);
	}

	// 设置用户登录cookie
	protected function setUserToken($token)
	{
		cookie('token',$token);
	}

	// 模块、控制器、方法信息
	protected function getDispatch()
	{

		return request()->dispatch()['module'];
	}

	// 版本信息
	protected function getV() {
		return '/v1/';
	}

}