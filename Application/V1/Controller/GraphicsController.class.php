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
        $userID = $_POST["user_id"];
        $content = $_POST["content"];
        $imgUrl = $_POST["img_url"];
        $uploadTime = $_POST["upload_time"];
//        $userID = 22;
//        $content = "青春,不后悔";
//        $imgUrl = "http://www.zitai-server.com/img.jpg";
//        $uploadTime = 23647652734324;
        $ary = array(
            "userId" => $userID,
            "content" => $content,
            "imageUrl" => $imgUrl,
            "uploadTime" => $uploadTime
        );
        $result = M("graphics") -> add($ary);
        CommonJsonUtil::uploadResult($result);
    }

    /*
     * 获取"图片"信息接口
     *     根据上传时间降序搜查
     */
    public function getGraphicsLists($page){
        $result = M("graphics") -> order("uploadTime desc") -> page($page, C(DEFAULT_PAGESIZE)) -> select();
        if($result){
            echo CommonJsonUtil::toSuccessJson($result);
        } else {
            echo CommonJsonUtil::toFailJson();
        }
    }
}
