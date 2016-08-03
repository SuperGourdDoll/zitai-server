<?php
namespace V1\Util;
class CommonJsonUtil
{
    /**�ɹ� תjson�����
     * @param int $code
     * @param string $msg
     * @param ����Դ
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
}

?>