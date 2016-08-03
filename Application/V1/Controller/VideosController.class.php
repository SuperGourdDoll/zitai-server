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

        if(count($data)>=0) {
            for($i=0;$i<count($data);$i++){
                $data[$i]['id']=intval($data[$i]['id']);
                $data[$i]['sharenum']=intval($data[$i]['sharenum']);
                $data[$i]['uploadtime']=intval($data[$i]['uploadtime']);
                $data[$i]['likenum']=intval($data[$i]['likenum']);
                $data[$i]['playtime']=intval($data[$i]['playtime']);
            }
            CommonJsonUtil::toSuccessJson($data);
        }else{
          //  echo "fail";
            CommonJsonUtil::toFailJson();
        }
    }
    public function index(){
        echo "hello";
    }
}