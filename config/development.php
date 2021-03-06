<?php

return [

    // +----------------------------------------------------------------------
    // | 数据库设置
    // +----------------------------------------------------------------------

    'database'               => [
        // 数据库类型
        'type'            => 'mysql',
        // 服务器地址
        'hostname'        => '127.0.0.1',
        // 数据库名
        'database'        => 'tp5',
        // 数据库用户名
        'username'        => 'root',
        // 数据库密码
        'password'        => '',
        // 数据库表前缀
        'prefix'          => 'tb_',
        // 数据库调试模式
        'debug'           => false,
        // 自动写入时间戳字段
        'auto_timestamp'  => false,
        // 时间字段取出后的默认时间格式
        'datetime_format' => 'Y-m-d H:i:s',
    ],
];