<?php

namespace Openphp\JdDj\Request;

use Openphp\JdDj\Request;

class AfterSales extends Request
{
    /**
     * 上传快递单号接口
     * @param $afsServiceOrder
     * @param $returnExpressNo
     * @param $operatePin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=7754d74d08f1436984c1912581f2107d
     */
    public function setReturnExpressNo($afsServiceOrder, $returnExpressNo, $operatePin)
    {
        return $this->post('afs/' . __FUNCTION__, compact('afsServiceOrder', 'returnExpressNo', 'operatePin'));
    }


    /**
     * 查询订单是否可售后接口
     * @param $orderId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=70cb45273d014b41bff417b90a26cd8a
     */
    public function checkCanApply($orderId)
    {
        return $this->post('afsInner/' . __FUNCTION__, compact('orderId'));
    }


    /**
     * 查询订单申请售后详情接口
     * @param $orderId
     * @return mixed
     */
    public function getOrderAfsApplyInfo($orderId)
    {
        return $this->post('afsInner/' . __FUNCTION__, compact('orderId'));
    }


    /**
     * 售后金额计算接口
     * @param       $orderId
     * @param array $skuList
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=5a92f8baf58b4e3b9f7309357b197d0a
     */
    public function calcMoney($orderId, array $skuList = [])
    {
        return $this->post('afs/' . __FUNCTION__, compact('orderId', 'skuList'));
    }


    /**
     * 商家自主发起售后接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=b8d1ddacb03846a8a2e78c79723c752f
     */
    public function submit(array $options)
    {
        return $this->post('afs/' . __FUNCTION__, $options);
    }

    /**
     * 查询售后单详情接口
     * @param $afsServiceOrder
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=6805ed690b7b4776b058067312c57d98
     */
    public function getAfsService($afsServiceOrder)
    {
        return $this->post('afs/' . __FUNCTION__, compact('afsServiceOrder'));
    }


    /**
     * 申请售后单审核接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=1690f6efc0144d59823b236e0d8506a1
     */
    public function afsOpenApprove(array $options)
    {
        return $this->post('afs/' . __FUNCTION__, $options);
    }


    /**
     * 换货退货时上门取件可选时间段获取接口
     * @param     $storeId
     * @param     $afsDeal
     * @param int $payType
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=4f2395e193a8404c938d1438c0991845
     */
    public function getPromiseTime($storeId, $afsDeal, $payType = 0)
    {
        $options = compact('storeId', 'afsDeal');

        if ($payType) {
            $options['payType'] = $payType;
        }
        return $this->post('afs/' . __FUNCTION__, $options);
    }


    /**
     * 售后单确认收货接口
     * @param $afsServiceOrder
     * @param $pin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=4826086e81934405980ae26f80d956e0
     */
    public function confirmReceipt($afsServiceOrder, $pin)
    {
        return $this->post('afs/' . __FUNCTION__, compact('afsServiceOrder', 'pin'));
    }

    /**
     * 商家确认未收到货
     * @param $afsServiceOrder
     * @param $pin
     * @param $stationNo
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=73f133f17bbd4ece9fc5b119f3439a0e
     */
    public function confirmReceiptFailOpen($afsServiceOrder, $pin, $stationNo)
    {
        return $this->post('afs/' . __FUNCTION__, compact('afsServiceOrder', 'pin', 'stationNo'));
    }

    /**
     * 商家处理阶段处理为换货、维修、退款
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=25ddc547df5445ec9838bca12896dc18
     */
    public function goodReceiptOrRepairProcessOpen(array $options)
    {
        return $this->post('afs/' . __FUNCTION__, $options);
    }

    /**
     * 换货失败商家处理阶段处理为线下解决或退款
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=8c94a761e6f2428e8a9cd2f381915436
     */
    public function changeWareFailThenProcessOpen(array $options)
    {
        return $this->post('afs/' . __FUNCTION__, $options);
    }


    /**
     * 查询售后单跟踪日志接口
     * @param $serviceOrder
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=ce7e58bb6f484361b3b56f88bddbece4
     */
    public function getServiceLogInfo($serviceOrder)
    {
        return $this->post('afs/' . __FUNCTION__, compact('serviceOrder'));
    }

    /**
     * 查询订单下售后单信息接口
     * @param $serviceOrder
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=2ceab82b66b04ae08050a4853856cceb
     */
    public function getAfsSeriveOrderList($serviceOrder)
    {
        return $this->post('afs/' . __FUNCTION__, compact('serviceOrder'));
    }

    /**
     * 查询商家完结售后单列表接口
     * @param $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=170&apiid=8bb80cf6ec204d88aeaab92243ac3e43
     */
    public function getFinalAfsServiceListByConditon($options)
    {
        return $this->post('afs/' . __FUNCTION__, $options);
    }
}