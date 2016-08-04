<?php
namespace V1\Model;

use Think\Model\RelationModel;

class VideosModel extends RelationModel
{
    protected $_link = array('users' => array('mapping_type' => self::BELONGS_TO,//user表从属于视频表
         'mapping_name' => 'users',//匹配的名字
        'foreign_key' => 'uid',//外键
        'mapping_fields' => 'username',//要匹配的字段 必须小写
        'as_fields' => 'username:author',//指定查询的字段作为新表的字段输出 并指定别名
        'parent_key' => 'id'));
}

?>