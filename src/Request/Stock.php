<?php

namespace Openphp\JdDj\Request;

use Openphp\JdDj\Request;

class Stock extends Request
{
    /**
     * 根据商家商品编码和商家门店编码更新门店现货库存接口
     * @param $stationNo
     * @param $skuId
     * @param $currentQty
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=a78664d4ead349da95d2f4576ed18d7f
     */
    public function update($stationNo, $skuId, $currentQty)
    {
        return $this->post('stock/' . __FUNCTION__, compact('stationNo', 'skuId', 'currentQty'));
    }

    /**
     * 根据商家商品编码和商家门店编码批量修改现货库存接口
     * @param        $outStationNo
     * @param array  $skuStockList
     * @param        $userPin
     * @param string $stationNo
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=10812f9fc7ee4564b552f19270a7e92e
     */
    public function batchUpdateCurrentQtys($outStationNo, array $skuStockList, $userPin, $stationNo = '')
    {
        return $this->post('stock/' . __FUNCTION__, compact('outStationNo', 'skuStockList', 'userPin', 'stationNo'));
    }

    /**
     * 根据到家商品编码、到家门店编码更新门店现货库存
     * @param $stationNo
     * @param $skuId
     * @param $currentQty
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=af70e699d4974e1683128742018f6381
     */
    public function currentQty($stationNo, $skuId, $currentQty)
    {
        return $this->post('stock/' . __FUNCTION__, compact('stationNo', 'skuId', 'currentQty'));
    }

    /**
     * 根据到家商品编码和到家门店编码批量更新锁定库存接口
     * @param array $listBaseStockCenterRequest
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=8d45790b51864a2c98ad630cbe32ce76
     */
    public function updateOpenLockQtys(array $listBaseStockCenterRequest)
    {
        return $this->post('stock/' . __FUNCTION__, compact('listBaseStockCenterRequest'));
    }

    /**
     * 根据商家商品编码和商家门店编码单个更新可售状态接口
     * @param $outStationId
     * @param $outSkuId
     * @param $doSale
     * @param $userPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=fcfc7f689252449bbf6288e60427b84f
     */
    public function updateVendibility4SingleByOutsideSkuId($outStationId, $outSkuId, $doSale, $userPin)
    {
        return $this->post('stock/' . __FUNCTION__, compact('outStationId', 'outSkuId', 'userPin', 'doSale'));
    }

    /**
     * 根据商家商品编码和门店编码批量修改门店商品可售状态接口
     * @param       $outStationNo
     * @param       $stationNo
     * @param array $stockVendibilityList
     * @param       $userPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=ac6f559ebabf4b70bc423687638e07c1
     */
    public function batchUpdateVendibility($outStationNo, $stationNo, array $stockVendibilityList, $userPin)
    {
        return $this->post('stock/' . __FUNCTION__, compact('outStationNo', 'stationNo', 'stockVendibilityList', 'userPin'));
    }

    /**
     * 根据到家商品编码单个更新可售状态接口
     * @param $stationId
     * @param $skuId
     * @param $doSale
     * @param $userPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=357fefa902af4e058a7436e1509297dd
     */
    public function updateVendibility4SingleBySkuId($stationId, $skuId, $doSale, $userPin)
    {
        return $this->post('stock/' . __FUNCTION__, compact('stationId', 'skuId', 'userPin', 'doSale'));
    }

    /**
     * 根据到家商品编码和到家门店编码批量修改门店商品可售状态接口
     * @param array $listBaseStockCenterRequest
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=b783a508e2cf4aca94681e4eed9af5bc
     */
    public function updateVendibility(array $listBaseStockCenterRequest)
    {
        return $this->post('stock/' . __FUNCTION__, compact('listBaseStockCenterRequest'));
    }

    /**
     * 根据到家商品编码和门店编码批量查询商品库存及可售状态信息接口
     * @param array $listBaseStockCenterRequest
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=bc6ad75e8fd34580856e06b5eb149aad
     */
    public function queryOpenUseable(array $listBaseStockCenterRequest)
    {
        return $this->post('stock/' . __FUNCTION__, compact('listBaseStockCenterRequest'));
    }

    /**
     * 根据商家商品编码和门店编码批量查询商品库存及可售状态信息接口
     * @param       $outStationNo
     * @param array $skuIds
     * @param       $userPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=ba70316bb84f425f8c088d3c19b2570d
     */
    public function queryStockCenter($outStationNo, array $skuIds, $userPin)
    {
        return $this->post('stock/' . __FUNCTION__, compact('outStationNo', 'skuIds', 'userPin'));
    }

    /**
     * 根据商家商品编码更新门店单个商品缺货状态接口
     * @param       $outStationId
     * @param array $stockouts
     * @param       $userPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=c1fa6a78bda741029c29db352408e607
     */
    public function updateStockoutByOutSkuId($outStationId, array $stockouts, $userPin)
    {
        return $this->post('stock/' . __FUNCTION__, compact('outStationId', 'stockouts', 'userPin'));
    }

    /**
     * 根据商家商品编码批量更新门店商品缺货状态
     * @param       $outStationId
     * @param array $stockouts
     * @param       $userPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=86c5b6a0ae3144d5b5613cc88ce0be0e
     */
    public function updateStockoutListByOutSkuId($outStationId, array $stockouts, $userPin)
    {
        return $this->post('stock/' . __FUNCTION__, compact('outStationId', 'stockouts', 'userPin'));
    }

    /**
     * 根据到家商品编码更新门店单个商品缺货状态接口
     * @param       $stationId
     * @param array $stockouts
     * @param       $userPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=67d2e01e33354d7cb78855d9596f4b8b
     */
    public function updateStockoutBySkuId($stationId, array $stockouts, $userPin)
    {
        return $this->post('stock/' . __FUNCTION__, compact('stationId', 'stockouts', 'userPin'));
    }

    /**
     * 根据到家商品编码批量更新门店商品缺货状态接口
     * @param       $stationId
     * @param array $stockouts
     * @param       $userPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=34d8e44596a1453ba58483ce18111f31
     */
    public function updateStockoutListBySkuId($stationId, array $stockouts, $userPin)
    {
        return $this->post('stock/' . __FUNCTION__, compact('stationId', 'stockouts', 'userPin'));
    }


    /**
     * （新）哥伦布仓储库存变更增量接口
     * @param $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=186ac5d39fbd49f29184de4926ba26ad
     */
    public function merchantOrderOut(array $options)
    {
        return $this->post('wms/' . __FUNCTION__, $options);
    }

    /**
     * 哥伦布仓储库存变更增量接口
     * @param $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=ec53e6162d94438aa27afde386206a64
     */
    public function updateWmsStock4Inc(array $options)
    {
        return $this->post('wms/' . __FUNCTION__, $options);
    }

    /**
     * 哥伦布仓储库存变更存量接口
     * @param $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=bd0132463f84412a9730d3be752a421d
     */
    public function updateWmsStock4Rem(array $options)
    {
        return $this->post('wms/' . __FUNCTION__, $options);
    }

    /**
     * 哥伦布仓储库存全量查询接口
     * @param $stationNoDj
     * @param $stationNoOuter
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=bd0132463f84412a9730d3be752a421d
     */
    public function getStockListForMerchant($stationNoDj, $stationNoOuter)
    {
        return $this->post('wms/' . __FUNCTION__, compact('stationNoDj', 'stationNoOuter'));
    }

    /**
     * 哥伦布下单预占库存接口
     * @param $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=363829fecc7f4f96846a61231f345a4f
     */
    public function createMerchantOrder(array $options)
    {
        return $this->post('wms/' . __FUNCTION__, $options);
    }

    /**
     * 哥伦布商家取消订单返还预占接口
     * @param $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=200&apiid=b019250181dc44e1a9f3499f674655b4
     */
    public function orderCancel(array $options)
    {
        return $this->post('wms/' . __FUNCTION__, $options);
    }
}