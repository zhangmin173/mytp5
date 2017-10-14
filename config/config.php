<?php
use think\Env;

return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------
    
	// 默认Host地址
    'app_host'               => '',
    // 应用调试模式
    'app_debug'              => false,
    // 应用Trace
    'app_trace'              => false,
    // 应用模式状态
    'app_status'             => Env::get('app_status',''),
    // 默认输出类型
    'default_return_type'    => 'html',
    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'    => 'json',
    // 默认JSONP格式返回的处理方法
    'default_jsonp_handler'  => 'jsonpReturn',
    // 默认JSONP处理方法
    'var_jsonp_handler'      => 'callback',
    // 默认全局过滤方法 用逗号分隔多个
    'default_filter'         => 'htmlspecialchars',

    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    // 视图输出字符串内容替换
    'view_replace_str'       => [],
    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => 'public/dispatch_jump',
    'dispatch_error_tmpl'    => 'public/dispatch_jump',

    // +----------------------------------------------------------------------
    // | 异常及错误设置
    // +----------------------------------------------------------------------

    // 异常页面的模板文件
    'exception_tmpl'         => APP_PATH . DS . 'think_exception.html',
    // 错误显示信息,非调试模式有效
    'error_message'          => '页面错误！请上报管理员，谢谢配合！',
    // 显示错误信息
    'show_error_msg'         => false,
    // 异常处理handle类 留空使用 \think\exception\Handle
    'exception_handle'       => '',

    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------

    'cache'                  => [
        // 驱动方式
        'type'   => 'File',
        // 缓存保存目录
        'path'   => CACHE_PATH,
        // 缓存前缀
        'prefix' => '',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
    ],

    //分页配置
    'paginate'               => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'list_rows' => 15,
    ],

];