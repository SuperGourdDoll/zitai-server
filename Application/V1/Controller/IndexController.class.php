<?php
namespace V1\Controller;
use Think\Controller;
use V1\Util\TokenUtil;
import('Util\TokenUtil');

/**
*  该控制器放置所有的基本模块内容
*/
class IndexController extends Controller {
    public function index(){
        $token= TokenUtil::makeToken("Token:Kane is more handsome than Bryant");
        echo $token;
        echo '<br>';
        echo TokenUtil::verifyToken($token);
    }
	
	public function hello($name = 'ss'){
		echo $name ." ". "is very handsome";
	}
}