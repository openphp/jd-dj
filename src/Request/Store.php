<?php

namespace Openphp\JdDj\Request;

use Openphp\JdDj\Request;

class Store extends Request
{
    /**
     * 获取到家所有城市信息列表接口
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=48c7416a02714b4ea7762fad3496ce56
     */
    public function allcities()
    {
        return $this->get('address/' . __FUNCTION__, []);
    }

    /**
     * 获取商家服务城市列表
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=6a1cfc654908417db2cdefbaaad58108
     */
    public function queryVenderServiceArea()
    {
        return $this->get('venderApiService/' . __FUNCTION__, []);
    }


    /**
     * 根据城市编码查询区域信息列表接口
     * @param string $areaCode 调用地址code
     * @param string $pin 用户pin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=cc2a3b5d49e84f3eb41ee39a0afe33c3
     */
    public function getNextLevelByType($areaCode, $pin)
    {
        return $this->get('address/' . __FUNCTION__, compact('areaCode', 'pin'));
    }

    /**
     * 新增不带资质的门店信息接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=93acef27c3aa4d8286d5c8c26b493629
     */
    public function createStore($options)
    {
        return $this->get('store/' . __FUNCTION__, $options);
    }

    /**
     * 提交资质接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=0daf640d39114f8da7797c4e784d15a1
     */
    public function submitStoreQualifyList($options)
    {
        return $this->get('store/' . __FUNCTION__, $options);
    }

    /**
     * 查询门店资质审核状态接口
     * @param string $stationNo
     * @param string $outSystemId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=633e72fb15f5440892f476c486a6457d
     */
    public function queryQualifyApproveState($stationNo, $outSystemId = '')
    {
        $options = compact('stationNo');
        if ($outSystemId) {
            $options['outSystemId'] = $outSystemId;
        }
        return $this->get('store/' . __FUNCTION__, $options);
    }

    /**
     * 获取到家门店编码列表接口
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=138426aa19b54c48ae8464af1ca3b681
     */
    public function getStationsByVenderId()
    {
        return $this->get('store/' . __FUNCTION__, []);
    }

    /**
     * 根据到家门店编码查询门店基本信息接口
     * @param string $StoreNo
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=4c48e347027146d5a103e851055cb1a7
     */
    public function getStoreInfoByStationNo($StoreNo)
    {
        return $this->get('storeapi/' . __FUNCTION__, compact('StoreNo'));
    }

    /**
     * 获取门店配送范围接口
     * @param string $stationNo
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=8f6d0ac75d734c68bf5bd2a09f376a78
     */
    public function getDeliveryRangeByStationNo($stationNo)
    {
        return $this->get('store/' . __FUNCTION__, compact('stationNo'));
    }

    /**
     * 修改门店基础信息接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=2600369a456446f0921e918f3d15e96a
     */
    public function updateStoreInfo4Open(array $options)
    {
        return $this->post('store/' . __FUNCTION__, $options);
    }

    /**
     * 根据到家门店编码修改商家自动接单接口
     * @param string $stationNo
     * @param int    $isAutoOrder 是否自动接单。0:是 1:否
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=5df446bb5ff14413965b8d702718dc48
     */
    public function updateStoreConfig4Open($stationNo, $isAutoOrder = 1)
    {
        return $this->post('store/' . __FUNCTION__, compact('stationNo', 'isAutoOrder'));
    }

    /**
     * 修改门店运费起送价及满免接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=bb6d4e5ad27b419993b6879a9bcd8efb
     */
    public function updateStoreFreightConfigNew(array $options)
    {
        return $this->post('freight/' . __FUNCTION__, $options);
    }

    /**
     * 根据门店编码修改运费起送价、满免以及商家自送运费接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=997977a13c62449ba15f3db3b4aec932
     */
    public function updateStoreFreightConfig(array $options)
    {
        return $this->post('freight/' . __FUNCTION__, $options);
    }

    /**
     * 查询商家中心账号信息接口
     * @param int $pageNo
     * @param int $pageSize
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=67a5cd92e9704612b77064401a696144
     */
    public function searchUser($pageNo = 1, $pageSize = 10)
    {
        return $this->post('privilege/' . __FUNCTION__, compact('pageNo', 'pageSize'));
    }

    /**
     * 修改商家中心账号状态接口
     * @param string $id
     * @param int    $status
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=577224e9eac046cdaa3928d0487d51bd
     */
    public function updateUser($id, $status = 0)
    {
        return $this->post('privilege/' . __FUNCTION__, compact('id', 'status'));
    }

    /**
     * 商家门店评价信息回复接口
     * @param string $orderId
     * @param string $content
     * @param string $replyPin
     * @param string $storeId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=ea0b466a7fa8489b813e8b197efca2d4
     */
    public function orgReplyComment($orderId, $content, $replyPin, $storeId = '')
    {
        $options = compact('orderId', 'content', 'replyPin');
        if ($storeId) {
            $options['storeId'] = $storeId;
        }
        return $this->post('commentOutApi/' . __FUNCTION__, $options);
    }

    /**
     * 根据订单号查询商家门店评价信息接口
     * @param string $orderId
     * @param string $storeId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=bd23397725bb4e74b69e2f2fa1c88d43
     */
    public function getCommentByOrderId($orderId, $storeId = '')
    {
        $options = compact('orderId');
        if ($storeId) {
            $options['storeId'] = $storeId;
        }
        return $this->post('commentOutApi/' . __FUNCTION__, $options);
    }

    /**
     * 初始化商家会员信息接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=865465fba05241519dbc089e09582914
     */
    public function initMerchantMemberInfo(array $options)
    {
        return $this->post('member/' . __FUNCTION__, $options);
    }

    /**
     * 更新商家会员信息接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=5db45d085ee84a7496c871d742bac56e
     */
    public function updateMerchantMemberInfo(array $options)
    {
        return $this->post('member/' . __FUNCTION__, $options);
    }

    /**
     * 查询到家注册的商家会员注册信息接口
     * @param        $orderId
     * @param string $uuid
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=59dae7634dd34c8fab4a57e9a803f3b0
     */
    public function getCommonMemberRegisteredInfo($orderId, $uuid = '')
    {
        $options = compact('orderId');
        if ($uuid) {
            $options['uuid'] = $uuid;
        }
        return $this->post('member/' . __FUNCTION__, $options);
    }

    /**
     * 商家会员制卡成功接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=b89506d8fb13401dafdd155adfcad200
     */
    public function createCardInfo(array $options)
    {
        return $this->post('member/' . __FUNCTION__, $options);
    }

    /**
     * 更新已绑定到家的商家会员卡信息接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=7fdf6a8a64b14126a84b184818525599
     */
    public function updateCardInfo(array $options)
    {
        return $this->post('member/' . __FUNCTION__, $options);
    }

    /**
     * 商家会员续费成功接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=350ee4cd19244cf7b74d503a1683e70b
     */
    public function renewCardInfo(array $options)
    {
        return $this->post('member/' . __FUNCTION__, $options);
    }

    /**
     * 异步积分换券回调
     * @param string $uniqueNo
     * @param bool   $flag
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=7dcd000a66b84243b7bd23aab454db9c
     */
    public function exchangeCallback($uniqueNo, $flag = true)
    {
        return $this->post('vipPoints/' . __FUNCTION__, compact('uniqueNo', 'flag'));
    }

    /**
     * 批量同步商家会员信息接口
     * @param array $requestList
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=194&apiid=346103af6775457ab50473f530aec9ab
     */
    public function synchronousMerchantMemberInfo(array $requestList)
    {
        return $this->post('member/' . __FUNCTION__, compact('requestList'));
    }
}