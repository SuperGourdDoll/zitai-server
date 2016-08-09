<?php
namespace V1\Controller;

use Think\Controller;
use V1\Util\CommonJsonUtil;

/**
 *  该控制器放置所有的 上传模块 内容
 */
class UploadsController extends Controller
{
    /**
     * 视频
     */
    const UPLOAD_VIDEO = 1;
    /**
     * 图片
     */
    const UPLOAD_IMG = 2;
    /**
     * 文章
     */
    const UPLOAD_ARTICLE = 3;

    public function index()
    {
        echo "我会审核你上传的内容，不合格不给通过";
    }

    public function uploadSoul($json)
    {
        $obj = json_decode($json);
       // $contentArray = $obj->content;
        //根据type来区分 1视频 2图片 3文章
        $type = $obj->type;
        //判断是否空
        if (empty($type)) {
            $this->error();
            return;
        }
        switch ($type) {
            case self::UPLOAD_VIDEO:
                self::parseVideo($obj);
                break;
            case  self::UPLOAD_IMG:
                break;
            case  self::UPLOAD_ARTICLE:
                break;
            default:
                self:: error();
                break;
        }
    }

    /**
     * @param $data加入视频表
     */
    protected function  addIntoVideoTable($data){
        $Videos=M('videos');
        $result=$Videos->add($data);
        if($result){
            CommonJsonUtil::toSuccessJson();
        }else
            CommonJsonUtil::toFailJson();

    }

    /**解析视频数据并加入数据库
     * @param $obj
     * @param $title
     */
    protected function  parseVideo($obj){
        $videoTime = $obj->videoTime;
        $videoCover = $obj->videoCover;
        $classify = $obj->classify;
        $title = $obj->title;
        $uid=$obj->uid;
        if (!empty($videoTime) && !empty($videoCover) && !empty($classify)&&!empty($uid)) {
            $contentArray=$obj->content;
            if (count($contentArray) == 1) {
                $item = $contentArray[0];
                //视频地址
                $src = $item->src;
                //视频描述
                $desc = $item->desc;
                $data['title']=$title;
                $data['content']=$src;
                $data['likeNum']=0;
                $data['shareNum']=0;
                $data['videoTime']=$videoTime;
                $data['videoClass']=$classify;
                $data['playTime']=0;
                $data['videoCover']=$videoCover;
                $data['uploadTime']=time();
                $data['uid']=$uid;
                self::addIntoVideoTable($data);
            } else
                self:: error();
        } else
            self:: error();
    }
    protected function error()
    {
        CommonJsonUtil::toFailJson(1, "参数不和法");
    }
}