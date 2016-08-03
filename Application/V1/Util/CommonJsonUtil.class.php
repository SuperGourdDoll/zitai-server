<?php
namespace V1\Util;
class CommonJsonUtil
{
    /**成功 转json并输出
     * @param int $code
     * @param string $msg
     * @param 数据源
     * @return mixed
     */
    public static function toSuccessJson($data, $code = 0, $msg = 'ok')
    {
        $resultArray['code'] = $code;
        $resultArray['msg'] = $msg;
        $resultArray['data'] = $data;
        echo json_encode($resultArray);
    }

    /**失败 转json并输出
     * @param int $code 不转默认成功
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