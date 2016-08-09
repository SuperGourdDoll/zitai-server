<?php
namespace V1\Controller;
use Think\Controller;
use V1\Util\CommonJsonUtil;

/**
 *  该控制器放置所有的 图文模块 内容
 */
class GraphicsController extends Controller {
    /*
     * 上传图片接口
     *    请求方式：POST
     *    参数说明：
     *         user_id   用户ID
     *         content   发表内容
     *         img_url   图片地址
     *         upload_time  上传时间戳
     */
    public function uploadGraphics(){
//        $userID = $_POST["user_id"];
//        $content = $_POST["content"];
//        $uploadTime = $_POST["upload_time"];

        $userID = 39;
        $content = "青春,不后悔";
        $uploadTime = 23647652734327;

        //保存图片到服务器
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小 3M
        $upload->allowExts  = array('jpg', 'png', 'jpeg');// 设置附件上传类型
        $upload -> rootPath = './Public/';
        $upload->savePath =  './images/';// 设置附件上传目录
        $info = $upload -> upload();
        if(!$info) {// 上传错误提示错误信息
            CommonJsonUtil::toFailJson(1, $upload->getError());
        }else {// 上传成功
            $netAddress = "192.168.1.102";
            $public = "http://".$netAddress."/zitai-server/Public";
            $imgFile = $public.strstr($info["img"]["savepath"].$info["img"]["savename"],'/');//拿到图片的全路径存储名称
            $ary = array(
                "userId" =>  $userID,
                "content" => $content,
                "imageUrl" => $imgFile,
                "uploadTime" => $uploadTime
            );
            $result = M("graphics") -> add($ary);
            CommonJsonUtil::uploadResult($result);
        }
    }

    /*
     * 获取"图片"信息接口
     *     根据上传时间降序搜查
     */
    public function getGraphicsLists($page,$userID=-1){
        if($userID == -1){
            $result = M("graphics") -> order("uploadTime desc") -> page($page, 10) -> select();
        } else {
            $result = M("graphics") -> where("userid='$userID'") -> order("uploadTime desc") -> page($page, 10) -> select();
        }
        for($i=0;$i < count($result);$i++){
            $result[$i]["id"] = intval($result[$i]["id"]);
            $result[$i]["userid"] = intval($result[$i]["userid"]);
            $result[$i]["likenum"] = intval($result[$i]["likenum"]);
            $result[$i]["sharenum"] = intval($result[$i]["sharenum"]);
            $result[$i]["readnum"] = intval($result[$i]["readnum"]);
        }
        if($result){
            echo CommonJsonUtil::toSuccessJson($result);
        } else {
            echo CommonJsonUtil::toFailJson();
        }
    }
}
