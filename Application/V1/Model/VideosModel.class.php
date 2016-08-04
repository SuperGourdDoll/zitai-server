<?php
namespace V1\Model;

use Think\Model\RelationModel;

class VideosModel extends RelationModel
{
    protected $_link = array('users' => array('mapping_type' => self::BELONGS_TO,//user���������Ƶ��
         'mapping_name' => 'users',//ƥ�������
        'foreign_key' => 'uid',//���
        'mapping_fields' => 'username',//Ҫƥ����ֶ� ����Сд
        'as_fields' => 'username:author',//ָ����ѯ���ֶ���Ϊ�±���ֶ���� ��ָ������
        'parent_key' => 'id'));
}

?>