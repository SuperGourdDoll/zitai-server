<?php
namespace V1\Controller;
use Think\Controller;
use V1\Util\CommonJsonUtil;
/**
*  该控制器放置所有的 视频模块 内容
*/
class VideosController extends Controller {
    public function vlist($page=0){
        $Videos=M('videos');
       $data= $Videos->order('id desc')->page($page,C('DEFAULT_PAGESIZE'))->select();
    //    var_dump($data);
        if($data) {
            CommonJsonUtil::toSuccessJson($data);
        }else{
            CommonJsonUtil::toFailJson();
        }
    }
    public function index(){
        echo "hello";
    }
}