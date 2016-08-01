<?php
namespace V1\Controller;
use Think\Controller;

/**
*  该控制器放置所有的 用户模块 内容
*/
class UsersController extends Controller {

    public function index(){
		echo "bryant是不是最帅的？！那还用说，肯定的啊！！";
	}
	//以下仅作为测试
	public function login($username = 's21',$userpwd = 'ad22'){
		$user_name = trim(I('get.username'));
		$user_pwd = trim(I('get.userpwd',' ','md5'));

		$Users = M('users');
		$users['userName'] = $user_name;
		$users['userPassword'] = $user_pwd;
		$loginData = $Users -> where($users) -> select();
		if($loginData){
			$data['status'] = "0";
			$data['code'] = "login success";
		}else{
			$data['status'] = "1";
			$data['code'] = "login fail";
		}
		//$this -> ajaxReturn($data);
		echo var_dump($data);
	}
}

