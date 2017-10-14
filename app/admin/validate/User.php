<?php

namespace app\admin\validate;

class User extends Base
{
    protected $rule =   [
        'name'  => 'require',
        'mobile'   => 'require|length:11',
    ];
    
    protected $message  =   [
        'name.require' => '姓名必须填写',
        'mobile.require'     => '手机号必须填写',
        'mobile.length'   => '手机号不正确',   
    ];
    
    protected $scene = [
        'register'  =>  ['name','mobile'],
    ];
    
}