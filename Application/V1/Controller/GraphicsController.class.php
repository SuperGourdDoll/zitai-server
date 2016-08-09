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
//        $userID = $_POST["user_id"];
//        $content = $_POST["content"];
//        $uploadTime = $_POST["upload_time"];

        $userID = 39;
        $content = "�ഺ,�����";
        $uploadTime = 23647652734327;

        //����ͼƬ��������
        $upload = new \Think\Upload();// ʵ�����ϴ���
        $upload->maxSize  = 3145728 ;// ���ø����ϴ���С 3M
        $upload->allowExts  = array('jpg', 'png', 'jpeg');// ���ø����ϴ�����
        $upload -> rootPath = './Public/';
        $upload->savePath =  './images/';// ���ø����ϴ�Ŀ¼
        $info = $upload -> upload();
        if(!$info) {// �ϴ�������ʾ������Ϣ
            CommonJsonUtil::toFailJson(1, $upload->getError());
        }else {// �ϴ��ɹ�
            $netAddress = "192.168.1.102";
            $public = "http://".$netAddress."/zitai-server/Public";
            $imgFile = $public.strstr($info["img"]["savepath"].$info["img"]["savename"],'/');//�õ�ͼƬ��ȫ·���洢����
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
     * ��ȡ"ͼƬ"��Ϣ�ӿ�
     *     �����ϴ�ʱ�併���Ѳ�
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
