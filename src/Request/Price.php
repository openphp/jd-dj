<?php

namespace Openphp\JdDj\Request;

use Openphp\JdDj\Request;

class Price extends Request
{
    /**
     * 维护划线价接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=205&apiid=090ca68bdbf94434afccbe9b241cd9f9
     */
    public function updateLinePrice(array $options)
    {
        return $this->post('venderprice/' . __FUNCTION__, $options);
    }

    /**
     * 查询划线价接口
     * @param $stationNo
     * @param $skuIds
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=205&apiid=b429c0ea467f45b1a4190488d6e27ead
     */
    public function getStationInfoListNew($stationNo, $skuIds)
    {
        return $this->post('venderprice/' . __FUNCTION__, compact('stationNo', 'skuIds'));
    }

    /**
     * 根据到家商品编码和到家门店编码批量查询商品门店价格信息接口
     * @param $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=205&apiid=21ccd5a00d3a4582b4c9a8ef0ae238fc
     */
    public function getStationInfoList($options)
    {
        return $this->post('price/' . __FUNCTION__, $options);
    }

    /**
     * 创建会员促销
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=205&apiid=f39ede34e27e4e04a94a9db61353303f
     */
    public function savePromotionBtl(array $options)
    {
        return $this->post('promoteskuBtl/' . __FUNCTION__, $options);
    }

    /**
     * 修改门店商品会员价接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=205&apiid=22bad85ef38841e5a9c124d7c8e00679
     */
    public function updateStationPriceAndVipPrice(array $options)
    {
        return $this->post('vender/' . __FUNCTION__, $options);
    }


    /**
     * 删除门店商品会员价接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=205&apiid=73116e2b9f374814880f1272ba301fdf
     */
    public function delVipPrice(array $options)
    {
        return $this->post('vender/' . __FUNCTION__, $options);
    }

}