<?php
namespace V1\Controller;
use Think\Controller;
use Think\Db\Driver;

/**
*  该控制器放置所有的 文章模块 内容
*/
class ArticlesController extends Controller {

	//A方法测试连接
    public function index(){
		echo "此处很bryant";
		$Articles = A("articles");
		$Articles -> test_pdo();
	}


	/**
	 * 客户端获取所有文章内容信息
	 */
	public function getArticles($page,$userId=-1){
		$Articles = M("articles");
		if($userId == -1){
			$Articles -> order("uploadTime desc") -> page($page, C(DEFAULT_PAGESIZE)) -> select();
			$sql = $Articles -> getLastSql();
		}else{
			$Articles -> where("userId = '$userId'") -> order("uploadTime desc") -> select();
			$sql = $Articles -> getLastSql();
		}
		$data = R('Coms/test_pdo_normal');
		$prepare = $data -> prepare($sql);
		$prepare -> execute();
		$result = $prepare -> fetchAll(\PDO::FETCH_ASSOC);
		if($result){
			echo CommonJsonUtil::toSuccessJson($result);
		}else{
			echo CommonJsonUtil::toFailJson();
		}

	}

	/**
	 * 用户发布文章，即加入数据库操作
	 */
	public function setArticles($userId = 233,$title = 'kai',$content = 's3f'){
		$user_id = trim(I('get.userId'));
		$user_title = trim(I('get.title'));
		$user_content = trim(I('get.content'));

		$Articles = M("articles");
		$user_data['userId'] = $user_id;
		$user_data['title'] = $user_title;
		$user_data['content'] = $user_content;
		$user_data['uploadTime'] = date('Y-m-d H:i:s');
		$Articles -> add($user_data);

		CommonJsonUtil::toSuccessJson();
	}

	//R方法测试连接，无参数得到返回值
	public function index_test_R(){
		$data = R('Coms/test_pdo');
		$this -> ajaxReturn($data);
	}

	//R方法测试链接2，只有基本的几条信息，
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

	//R方法测试连接3，有参数，参数为sql语句
	public function index_test_has_para(){
		echo "Here used to test the R method";
		$Articles = M('articles');
		$Articles -> where('id = 2') -> select();
		$sql_res = $Articles -> getLastSql();   //得到上条查询ql语句

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
		$prepare -> execute();   //�����������
		$table = $prepare -> fetchAll(\PDO::FETCH_ASSOC);
		//var_dump($table);
		$this -> ajaxReturn($table);
	}*/
}
