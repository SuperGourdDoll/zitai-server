<?php
namespace V1\Controller;
use Think\Controller;

/**
*  该控制器放置所有的 上传模块 内容
*/
class UploadsController extends Controller {
    public function index(){
		echo "我会审核你上传的内容，不合格不给通过";
	}
}