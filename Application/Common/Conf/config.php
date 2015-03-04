<?php
return array(
    //这里处理下控模块问题
    'MODULE_ALLOW_LIST'    =>    array('Demo','Admin'),
    'DEFAULT_MODULE'       =>    'Demo',
    'URL_CASE_INSENSITIVE'  =>  false,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    'SHOW_ERROR_MSG'        => true,     // // 显示错误信息

    /* 数据库配置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'chat_room',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '8889',        // 端口
    'DB_PREFIX'             =>  'cr_',    // 数据库表前缀
);