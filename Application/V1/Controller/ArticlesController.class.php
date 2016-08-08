<?php
namespace V1\Controller;
use Think\Controller;
use Think\Db\Driver;

/**
*  �ÿ������������е� ����ģ�� ����
*/
class ArticlesController extends Controller {

	//A��������  ����̳й���������
    public function index(){
		echo "�˴���bryant";
		$Articles = A("articles");
		$Articles -> test_pdo();
	}

	//R�������ԣ�ʹ�÷�װ�õ�sql��䣬Ϊɶ�Ӳ��ܳɹ��أ�������������������
	public function index_test_R(){
		$data = R('Coms/test_pdo');
		$this -> ajaxReturn($data);
	}

	//R�������ԣ�PDO���ӣ�ֻ�л�������
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

	//R�������ԣ�����sql��䣬���ز�ѯ���ֵ��
	public function index_test_has_para(){
		echo "Here used to test the R method";
		$Articles = M('articles');
		$Articles -> where('id = 2') -> select();
		$sql_res = $Articles -> getLastSql();   //�ѷ�װ��sql����ת�ɳ���sql���

		$data = R('Coms/test_pdo_has_para',array($sql_res));
		$result['status'] = 0;
		$result['msg'] = 'fan hui success';
		$result['code'] = $data;
		$this -> ajaxReturn($result);
	}


	//����PDO����
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
		$prepare -> execute();   //�����������
		$table = $prepare -> fetchAll(\PDO::FETCH_ASSOC);
		//var_dump($table);
		$this -> ajaxReturn($table);
	}*/
}
