<?php

namespace Openphp\JdDj\Request;

use Openphp\JdDj\Request;

class Platform extends Request
{
    /**
     * token更新确认接口
     * @param $oldToken
     * @param $newToken
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=213&apiid=2a27a06025f24860acd912bf59c00956
     */
    public function verificationUpdateToken($oldToken, $newToken)
    {
        $appKey = $this->config['app_key'];
        return $this->post('ApplicationService/' . __FUNCTION__ . compact('oldToken', 'newToken', 'appKey'));
    }

    /**
     * 图片上传接口
     * @param string $imageBase64
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=213&apiid=c8607543fde04c48a4f650e51f984b90
     */
    public function imageUpload($imageBase64)
    {
        $this->url = $this->toolUrl;
        return $this->post('toolapi/' . __FUNCTION__ . compact('imageBase64'));
    }


    /**
     * 文件上传接口
     * @param string $fileBase64
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=213&apiid=55ccab405cb54ca982636433dd80180b
     */
    public function fileUpload($fileBase64)
    {
        $this->url = $this->toolUrl;
        return $this->post('toolapi/' . __FUNCTION__ . compact('fileBase64'));
    }
}