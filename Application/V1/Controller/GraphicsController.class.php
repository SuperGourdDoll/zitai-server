<?php
namespace V1\Controller;
use Think\Controller;

/**
*  �ÿ������������е� ͼ��ģ�� ����
*/
class GraphicsController extends Controller {

    public function index(){
		echo "ͼ�ĸ�����1";
	}

    public function getData(){
        echo json_encode(M("users") -> select());
    }
}
