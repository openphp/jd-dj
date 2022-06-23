<?php

namespace Openphp\JdDj;


abstract class Request
{

    /**
     * @var string
     */
    protected $toolUrl = 'https://opentool.jddj.com/';
    /**
     * @var string
     */
    protected $url = 'https://openo2o.jd.com/djapi/';
    /**
     * @var string[]
     */
    protected $config = [
        'app_key'    => '66012d001c8e46deb178d85d4ff9ce9d',
        'app_secret' => '1da6c434d91148f7966ce64ed6093c97',
        'token'      => 'fdc58d7f-bedf-4660-988e-79b303268534',
    ];

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @param $config
     */
    public function __construct($config = [])
    {
        $this->config = array_merge($this->config, $config);
    }

    /**
     * @param       $path
     * @param array $options
     * @return mixed
     */
    public function post($path, $options = [])
    {
        return $this->request($this->url . $path, $this->getParams($options));
    }

    /**
     * @param       $path
     * @param array $options
     * @return mixed
     */
    public function get($path, $options = [])
    {
        return $this->request($this->url . $path . '?' . http_build_query($this->getParams($options)));
    }


    /**
     * @param       $url
     * @param array $params
     * @param int   $readTimeout
     * @param int   $connectTimeout
     * @return mixed
     */
    protected function request($url, $params = [], $readTimeout = 60000, $connectTimeout = 3000)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == "https") {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $readTimeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $connectTimeout);
        if (count($params) > 0) {
            $header = array("content-type: application/x-www-form-urlencoded; charset=UTF-8");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params, '', '&'));
        }
        $reponse = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new \RuntimeException(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new \RuntimeException($reponse, $httpStatusCode);
            }
        }
        curl_close($ch);
        return json_decode($reponse, true);
    }

    /**
     * @param $options
     * @return mixed
     */
    protected function getParams($options)
    {
        $params['jd_param_json'] = json_encode($options);
        $params['token']         = $this->config['token'];
        $params['app_key']       = $this->config['app_key'];
        $params['timestamp']     = date('Y-m-d H:i:s');
        $params['v']             = '2.0';
        $params['format']        = 'json';
        $params['sign']          = strtoupper(md5($this->paramsToString($params)));
        return $params;
    }

    /**
     * @param $params
     * @return string
     */
    protected function paramsToString($params)
    {
        ksort($params);
        $sortedString = $this->config['app_secret'];
        foreach ($params as $k => $v) {
            $v = (string)$v;
            if ("sign" !== $k) {
                $sortedString .= "$k$v";
            }
        }
        $sortedString .= $this->config['app_secret'];
        return $sortedString;
    }
}