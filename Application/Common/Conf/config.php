<?php
return array(
	//'配置项'=>'配置值'
     /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'casinotest',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀

    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
 

    //自定义路径
    'TMPL_PARSE_STRING' => array(
        '__Admin__' => __ROOT__ . '/Public/Admin',
        'HOME_PUBLIC' => __ROOT__ . '/Public/Admin',
        )



);