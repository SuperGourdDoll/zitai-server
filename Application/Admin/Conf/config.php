<?php
return array(
	//'配置项'=>'配置值'
	//主题静态文件路径，后台管理系统用

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
	'DB_PWD' => 'ZXR1046154801',         //密码
	'DB_PORT' => '3306',        //端口号
	'DB_PREFIX' => 'sgd_',      //数据表前缀׺
	'DB_CHARSET' => 'utf8',     //编码格式
	'SHOW_PAGE_TRACE' => true,

	'TMPL_PARSE_STRING' => array(
		'__STATIC__' => __ROOT__.'/Application/'.MODULE_NAME.'/View/' . '/Public/static',),
	
);