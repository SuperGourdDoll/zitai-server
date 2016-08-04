<?php
namespace V1\Controller;
use Think\Controller;
use V1\Util\CommonJsonUtil;

/**
*  �ÿ������������е� ͼ��ģ�� ����
*/
class GraphicsController extends Controller {
    /*
     * �ϴ�ͼƬ�ӿ�
     *    ����ʽ��POST
     *    ����˵����
     *         user_id   �û�ID
     *         content   ��������
     *         img_url   ͼƬ��ַ
     *         upload_time  �ϴ�ʱ���
     */
    public function uploadGraphics(){
        $userID = $_POST["user_id"];
        $content = $_POST["content"];
        $imgUrl = $_POST["img_url"];
        $uploadTime = $_POST["upload_time"];
//        $userID = 22;
//        $content = "�ഺ,�����";
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
     * ��ȡ"ͼƬ"��Ϣ�ӿ�
     *     �����ϴ�ʱ�併���Ѳ�
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
