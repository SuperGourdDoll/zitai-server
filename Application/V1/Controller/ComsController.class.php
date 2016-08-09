<?php
namespace V1\Controller;
use Think\Controller;
use Think\Db\Driver;

/**
 *  该控制器放置所有的 文章模块 内容
 */
class ComsController extends Controller {

    /*
     * 在该公用方法中，设置几种不同的方法，来适应不用的调用，暂且这么定下来，将来重构代码的时候继续优化
     */


    public function index(){
        echo "此处很bryant";
    }

    //测试PDO连接 无参数
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
        $prepare -> execute();   //添加条件数据
        $table = $prepare -> fetchAll(\PDO::FETCH_ASSOC);
        return $table;
        //var_dump($table);
        //$this -> ajaxReturn($table);
    }

    //测试PDO连接 只有基本参数，
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

    //测试PDO连接,传入sql查询语句作为参数，返回查询出来的值，
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
        $prepare -> execute();   //添加条件数据
        $table = $prepare -> fetchAll(\PDO::FETCH_ASSOC);
        return $table;
        //var_dump($table);
        // $this -> ajaxReturn($table);
    }
}
