<?php

namespace Openphp\JdDj\Request;

use Openphp\JdDj\Request;

class Finance extends Request
{
    /**
     * 查询开票申请列表
     * @param int    $pageNum
     * @param int    $pageSize
     * @param string $stationNo
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=182&apiid=c577e8bfbddf4b1b947efc7b7f37f1a2
     */
    public function queryApplyHistory($pageNum = 0, $pageSize = 10, $stationNo = '')
    {
        $ts      = time();
        $options = compact('ts', 'pageNum', 'pageSize');
        if ($stationNo) {
            $options['stationNo'] = $stationNo;
        }
        return $this->post('gw/' . __FUNCTION__, $options);
    }

    /**
     * 新版订单金额拆分接口
     * @param        $orderId
     * @param string $userPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=182&apiid=4d1494c5e7ac4679bfdaaed950c5bc7f
     */
    public function queryOassBussMoney($orderId, $userPin = 'test')
    {
        return $this->post('oassBussService/' . __FUNCTION__, compact('orderId', 'userPin'));
    }


    /**
     * 分页查询结算单接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=182&apiid=3c6214051ba04226afc021d7b86f83f9
     */
    public function getSettleOrderList(array $options)
    {
        return $this->post('settle/' . __FUNCTION__, $options);
    }


    /**
     * 查询结算单明细接口
     * @param     $settleOrderId
     * @param int $pageNum
     * @param int $pageSize
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=182&apiid=0479abfa8f894ade9fe1d6ac83176c8c
     */
    public function getSettleOrderDetail($settleOrderId, $pageNum = 1, $pageSize = 100)
    {
        return $this->post('settle/' . __FUNCTION__, compact('settleOrderId', 'pageSize', 'pageNum'));
    }


    /**
     * 大商户查询结算单明细文件交互接口
     * @param array $dates 日期列表，最多支持10天，示例：[20200605,20200606]
     * @return mixed
     */
    public function getSettleOrderFile(array $dates)
    {
        return $this->post('settle/' . __FUNCTION__, compact('dates'));
    }


    /**
     * 分页查询对账单接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=182&apiid=0bedea74a477409990b2ff8666a9ff44
     */
    public function getBalanceBillList(array $options)
    {
        return $this->post('balance/' . __FUNCTION__, $options);
    }

    /**
     * 查询对账单货款明细接口
     * @param     $orderId
     * @param int $time
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=182&apiid=b217aa8ca24c47cfaaed328e1cfbd811
     */
    public function getBalanceBillDetail($orderId, $time)
    {
        return $this->post('balance/' . __FUNCTION__, compact('orderId', 'time'));
    }


    /**
     * 查询日账单压缩文件下载地址
     * @param array $dates 日期Ò
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=182&apiid=a64ab4f7acc847a383bfadd733690fd0
     */
    public function getBillOrderFileInfo(array $dates)
    {
        return $this->post('settle/' . __FUNCTION__, compact('dates'));
    }

    /**
     * 查询订单计费明细接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=182&apiid=b396331af4bf4d84b315541b54915071
     */
    public function checkBill(array $options)
    {
        return $this->post('bill/' . __FUNCTION__, $options);
    }


    /**
     * 查询订单售后计费明细接口
     * @param        $orderId
     * @param int    $afsSource
     * @param string $afsId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=182&apiid=4a0b2f16ae884695876aab70e79783ee
     */
    public function checkAfsBill($orderId, $afsSource = 1, $afsId = '')
    {
        return $this->post('balance/' . __FUNCTION__, compact('orderId', 'afsSource', 'afsId'));
    }

}