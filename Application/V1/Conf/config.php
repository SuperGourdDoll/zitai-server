<?php
return array(
	//'配置项'=>'配置值'
	//主题静态文件路径，后台管理系统用
	'TMPL_PARSE_STRING' => array(
		'_STATIC_' => _ROOT_ . '/Application/' . MODULE_NAME . '/View/' . '/Public/static'
	),
	'TOKEN_ON'      =>    true,  // 是否开启令牌验证 默认关闭
    'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'   =>    true,  //令牌验证出错后是否重置令牌 默认为true
	
	//是否开启模板布局，根据个人习惯设置
	'LAYOUT_ON' => false,
	
	//添加数据库配置信息
	'DB_TYPE' => 'mysql',   //数据库类型
	'DB_HOST' => 'localhost',        //服务器地址
	'DB_NAME' => 'super_gd',        //数据库名 
	'DB_USER' => 'root',        //用户名
	'DB_PWD' => 'sgd4sgd',         //密码
	'DB_PORT' => '3306',        //端口
	'DB_PREFIX' => 'sgd_',      //数据库表前缀
	'DB_CHARSET' => 'utf8',     //数据库字符集
	'SHOW_PAGE_TRACE' => false,
    'TOKEN_KEY'=>'sgd_zitai',  //供用户使用token
	
);