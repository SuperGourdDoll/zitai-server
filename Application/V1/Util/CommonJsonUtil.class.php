<?php
namespace V1\Util;
class CommonJsonUtil
{
    /**�ɹ� תjson�����
     * @param int $code
     * @param string $msg
     * @param array $data ����Դ
     * @return mixed
     */
    public static function toSuccessJson($data, $code = 0, $msg = 'ok')
    {
        $resultArray['code'] = $code;
        $resultArray['msg'] = $msg;
        $resultArray['data'] = $data;
        echo json_encode($resultArray);
    }

    /**ʧ�� תjson�����
     * @param int $code ��תĬ�ϳɹ�
     * @param string $msg
     * @return mixed
     */
    public static function toFailJson($code = 1, $msg = 'fail')
    {
        $resultArray['code'] = $code;
        $resultArray['msg'] = $msg;
        echo json_encode($resultArray);
    }

    /*
     * �ϴ��ɹ���ʧ�ܽ����תJSON���
     */
    public static function uploadResult($data){
        $resultArray = array();
        //�ϴ��ɹ�
        if($data){
            $resultArray['code'] = 0;
            $resultArray['msg'] = "success";
        } else {
        //�ϴ�ʧ��
            $resultArray['code'] = 1;
            $resultArray['msg'] = "fail";
        }
        echo json_encode($resultArray);
    }

}
?>