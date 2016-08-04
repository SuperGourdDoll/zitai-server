<?php
namespace V1\Controller;
use Think\Controller;

/**
*  该控制器放置所有的 图文模块 内容
*/
class GraphicsController extends Controller {

    public function index(){
		echo "图文更尽兴1";
	}

    public function getData(){
        echo json_encode(M("users") -> select());
    }
}
