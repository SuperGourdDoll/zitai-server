<?php
namespace V1\Controller;
use Think\Controller;
use Think\Db\Driver;

/**
 *  �ÿ������������е� ����ģ�� ����
 */
class ComsController extends Controller {

    /*
     * �ڸù��÷����У����ü��ֲ�ͬ�ķ���������Ӧ���õĵ��ã�������ô�������������ع������ʱ������Ż�
     */


    public function index(){
        echo "�˴���bryant";
    }

    //����PDO���� �޲���
    public function test_pdo(){
        //$sql_data = $_POST[$sql];
        $dsn = 'mysql:dbname=super_gd;host=localhost;port=3306';
        $username = 'root';
        $password = 'ZXR1046154801';
        $db = new \Pdo($dsn,$username,$password,
            array(
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ));
        $sql = "select * from sgd_articles";
        //$Articles = M('articles');
        //$sql = $Articles -> select();
        $prepare = $db -> prepare($sql);
        $prepare -> execute();   //�����������
        $table = $prepare -> fetchAll(\PDO::FETCH_ASSOC);
        return $table;
        //var_dump($table);
        //$this -> ajaxReturn($table);
    }

    //����PDO���� ֻ�л���������
    public function test_pdo_normal(){
        $dsn = 'mysql:dbname=super_gd;host=localhost;port=3306';
        $username = 'root';
        $password = 'ZXR1046154801';
        $db = new \Pdo($dsn,$username,$password,
            array(
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ));
        return $db;
    }

    //����PDO����,����sql��ѯ�����Ϊ���������ز�ѯ������ֵ��
    public function test_pdo_has_para($sql){
        echo $sql;
        $dsn = 'mysql:dbname=super_gd;host=localhost;port=3306';
        $username = 'root';
        $password = 'ZXR1046154801';
        $db = new \Pdo($dsn,$username,$password,
            array(
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ));
        //$sql = "select * from sgd_articles";
        $prepare = $db -> prepare($sql);
        $prepare -> execute();   //�����������
        $table = $prepare -> fetchAll(\PDO::FETCH_ASSOC);
        return $table;
        //var_dump($table);
        // $this -> ajaxReturn($table);
    }
}
