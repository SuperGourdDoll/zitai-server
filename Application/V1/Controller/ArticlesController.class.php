<?php
namespace V1\Controller;
use Think\Controller;
use Think\Db\Driver;

/**
*  该控制器放置所有的 文章模块 内容
*/
class ArticlesController extends Controller {

	//A方法测试  必须继承公共方法类
    public function index(){
		echo "此处很bryant";
		$Articles = A("articles");
		$Articles -> test_pdo();
	}

	//R方法测试，使用封装好的sql语句，为啥子不能成功呢？？？？？？！！！！
	public function index_test_R(){
		$data = R('Coms/test_pdo');
		$this -> ajaxReturn($data);
	}

	//R方法测试，PDO连接，只有基本部分
	public function index_test_normal(){
		$Articles = M('articles');
		$Articles -> where('id = 2') -> select();
		$sql_res = $Articles -> getLastSql();
		$data = R('Coms/test_pdo_normal');
		$prepare = $data -> prepare($sql_res);
		$prepare -> execute();
		$table = $prepare -> fetchAll(\PDO::FETCH_ASSOC);
		$this -> ajaxReturn($table);
	}

	//R方法测试，传入sql语句，返回查询后的值，
	public function index_test_has_para(){
		echo "Here used to test the R method";
		$Articles = M('articles');
		$Articles -> where('id = 2') -> select();
		$sql_res = $Articles -> getLastSql();   //把封装好sql方法转成常规sql语句

		$data = R('Coms/test_pdo_has_para',array($sql_res));
		$result['status'] = 0;
		$result['msg'] = 'fan hui success';
		$result['code'] = $data;
		$this -> ajaxReturn($result);
	}


	//测试PDO连接
	/*public function test_pdo(){
		$dsn = 'mysql:dbname=super_gd;host=localhost;port=3306';
		$username = 'root';
		$password = 'ZXR1046154801';
		$db = new \Pdo($dsn,$username,$password,
			array(
				\PDO::ATTR_EMULATE_PREPARES => false,
				\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
			));
		$sql = "select * from sgd_articles";
		$prepare = $db -> prepare($sql);
		$prepare -> execute();   //添加条件数据
		$table = $prepare -> fetchAll(\PDO::FETCH_ASSOC);
		//var_dump($table);
		$this -> ajaxReturn($table);
	}*/
}
