<?php

namespace Openphp\JdDj\Request;

use Openphp\JdDj\Request;

class Order extends Request
{
    /**
     * 根据订单号查询用药人信息接口
     * @param $orderId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=c2c318ee2a8d4883a3bd73a955e86062
     */
    public function getOrderPrescriptionInfo($orderId)
    {
        return $this->post('order/es/' . __FUNCTION__, compact('orderId'));
    }

    /**
     * 订单处方药审核结果接口
     * @param $orderId
     * @param $agree
     * @param $operator
     * @param $auditUrl
     * @param $remark
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=17fb6b8c6d1e4165a182c06b4f2ddac2
     */
    public function internetHospitalAudit($orderId, $agree, $operator, $auditUrl = '', $remark = '')
    {
        $options = compact('orderId', 'agree', 'operator');
        if ($auditUrl) {
            $options['auditUrl'] = $auditUrl;
        }
        if ($remark) {
            $options['remark'] = $remark;
        }
        return $this->post('ocs/' . __FUNCTION__, $options);
    }

    /**
     * 订单列表查询接口
     * @param $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=ba3027848c3c4fda9674966e2a466482
     */
    public function query($options = [])
    {
        return $this->post('order/es/' . __FUNCTION__, $options);
    }

    /**
     * 通过订单号查询药急送用药人信息
     * @param $orderId
     * @param $epidemicType
     * @param $prescriptionType
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=c3310c8e663049ba9251b8ee802180f2
     */
    public function queryUseDrugInfoForOpen($orderId, $epidemicType = false, $prescriptionType = false)
    {
        return $this->post('order/' . __FUNCTION__, compact('orderId', 'epidemicType', 'prescriptionType'));
    }

    /**
     * 根据订单号查询订单跟踪接口
     * @param $orderNo
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=d9d4fd73fba14fd8851a4c054d2ee42e
     */
    public function getByOrderNoForOaos($orderNo)
    {
        return $this->post('orderTrace/' . __FUNCTION__, compact('orderNo'));
    }

    /**
     * 新版根据订单号查询订单跟踪接口
     * @param $orderId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=6450cd91dd5b4dc0bb6a6cd17af6d0a4
     */
    public function getByOrderNoForOaosNew($orderId)
    {
        return $this->post('orderTrace/' . __FUNCTION__, compact('orderId'));
    }

    /**
     * 应结金额接口
     * @param $orderId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=17f0b596df554fe2b66fa7742a025d92
     */
    public function orderShoudSettlementService($orderId)
    {
        return $this->post('bill/' . __FUNCTION__, compact('orderId'));
    }

    /**
     * 商家确认接单接口
     * @param $orderId
     * @param $agree
     * @param $operator
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=c1a15129d1374e9da7fa35487f878604
     */
    public function orderAcceptOperate($orderId, $agree, $operator)
    {
        $options = compact('orderId', 'agree', 'operator');
        return $this->post('ocs/' . __FUNCTION__, $options);
    }

    /**
     * 订单已打印接口
     * @param $orderId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=53f38f865dae4e9aa5105f7558e622bf
     */
    public function printOrder($orderId)
    {
        return $this->post('bm/open/api/' . __FUNCTION__, compact('orderId'));
    }

    /**
     * 订单调整接口
     * @param $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=a7378109fd7243eea9efbb6231a7401c
     */
    public function adjustOrder($options)
    {
        return $this->post('orderAdjust/' . __FUNCTION__, $options);
    }

    /**
     * 拣货完成且众包配送接口
     * @param $orderId
     * @param $operator
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=ed93745b86c6487eaaea5f55a84785ac
     */
    public function OrderJDZBDelivery($orderId, $operator)
    {
        return $this->post('order/' . __FUNCTION__, compact('orderId', 'operator'));
    }


    /**
     * 拣货完成且商家自送接口
     * @param $orderId
     * @param $operator
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=0e08e71a45dc48b6a337e06a852ac33a
     */
    public function OrderSerllerDelivery($orderId, $operator)
    {
        return $this->post('order/' . __FUNCTION__, compact('orderId', 'operator'));
    }


    /**
     * 拣货完成且顾客自提接口
     * @param $orderId
     * @param $operator
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=4c0133c8cb264ee5b3f66f2881363cd6
     */
    public function OrderSelfMention($orderId, $operator)
    {
        return $this->post('order/' . __FUNCTION__, compact('orderId', 'operator'));
    }

    /**
     * 订单绑定取货位
     * @param $orderId
     * @param $takeDeliverPositions
     * @param $operPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=76f8415b7b384c33992126a4bb1a261e
     */
    public function bindTakeDeliverPosition($orderId, $takeDeliverPositions, $operPin)
    {
        return $this->post('ocs/modifyOrderService/' . __FUNCTION__, compact('orderId', 'takeDeliverPositions', 'operPin'));
    }


    /**
     * 取货失败后催配送员抢单接口
     * @param $orderId
     * @param $updatePin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=96383a8274bd463a95dfc8b8d74220d1
     */
    public function urgeDispatching($orderId, $updatePin)
    {
        return $this->post('bm/' . __FUNCTION__, compact('orderId', 'updatePin'));
    }


    /**
     * 订单商家加小费接口
     * @param $orderId
     * @param $tips
     * @param $operator
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=ed9e3ca7325c4d4d8ceaf959ed0e7a62
     */
    public function addTips($orderId, $tips, $operator)
    {
        return $this->post('order' . __FUNCTION__, compact('orderId', 'tips', 'operator'));
    }


    /**
     * 订单达达配送转商家自送接口
     * @param $orderId
     * @param $updatePin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=e7b4950164754eecac7ea87278c2b071
     */
    public function modifySellerDelivery($orderId, $updatePin)
    {
        return $this->post('order/' . __FUNCTION__, compact('orderId', 'updatePin'));
    }

    /**
     * 根据订单号查看配送员取货异常上报订单处理详情接口
     * @param $orderId
     * @param $source
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=e7b4950164754eecac7ea87278c2b071
     */
    public function getHandleReportRecord($orderId, $source)
    {
        return $this->post('order/' . __FUNCTION__, compact('orderId', 'source'));
    }


    /**
     * 商家处理配送员取货异常上报接口
     * @param $orderId
     * @param array $imgs
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=daf7890afb634794a287428373a121e6
     */
    public function handleReport($orderId, array $imgs)
    {
        return $this->post('order/' . __FUNCTION__, compact('orderId', 'imgs'));
    }

    /**
     * 商家审核配送员取货失败接口
     * @param $orderId
     * @param $isAgreed
     * @param $operator
     * @param $auditUrl
     * @param $remark
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=d10c63a2ea734b818b23f0bc1c8efe6f
     */
    public function receiveFailedAudit($orderId, $isAgreed, $operator, $remark = '')
    {
        $options = compact('orderId', 'isAgreed', 'operator');
        if ($remark) {
            $options['remark'] = $remark;
        }
        return $this->post('order/' . __FUNCTION__, $options);
    }


    /**
     * 商家确认收到拒收退回（或取消）的商品接口
     * @param $orderId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=21a55807c096410c9cac9b71e110fa43
     */
    public function confirmReceiveGoods($orderId)
    {
        $operateTime = date('Y-m-d H:i:s');
        return $this->post('order/' . __FUNCTION__, compact('orderId', 'operateTime'));
    }

    /**
     * 商家投诉达达配送员
     * @param $orderId
     * @param $reasonId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=200ade433c834b14994c7151468276d2
     */
    public function complaintDadaDeliverForPlatForm($orderId, $reasonId)
    {
        return $this->post('bm/open/api/order/' . __FUNCTION__, compact('orderId', 'reasonId'));
    }

    /**
     * 订单发送延迟配送的申请接口
     * @param $orderId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=4fe07cfa320f4e1b9a428c41993543f2
     */
    public function sendDeliveryDelay($orderId)
    {
        return $this->post('ocs/' . __FUNCTION__, compact('orderId'));
    }


    /**
     * 订单妥投接口
     * @param $orderId
     * @param $operPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=ecc80f06d35141979f4841f345001f74
     */
    public function deliveryEndOrder($orderId, $operPin)
    {
        $operTime = date('Y-m-d H:i:s');
        return $this->post('ocs/' . __FUNCTION__, compact('orderId', 'operPin', $operTime));
    }

    /**
     * 订单自提码核验接口
     * @param $orderId
     * @param $selfPickCode
     * @param $operPin
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=428fa2cb66784b64a85db36ec2972ff9
     */
    public function checkSelfPickCode($orderId, $selfPickCode, $operPin)
    {
        return $this->post('ocs/' . __FUNCTION__, compact('orderId', 'selfPickCode', $operPin));
    }

    /**
     * 商家审核用户取消申请接口
     * @param $orderId
     * @param $isAgreed
     * @param $operator
     * @param $auditUrl
     * @param $remark
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=906b430307764a3ca3698c05c72f33d0
     */
    public function orderCancelOperate($orderId, $isAgreed, $operator, $remark = '')
    {
        $options = compact('orderId', 'isAgreed', 'operator');
        if ($remark) {
            $options['remark'] = $remark;
        }
        return $this->post('ocs/' . __FUNCTION__, $options);
    }


    /**
     * 订单取消且退款接口
     * @param $orderId
     * @param $isAgreed
     * @param $operator
     * @param $auditUrl
     * @param $remark
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=6be3f3a811f14f22a83007ab02f23b03
     */
    public function cancelAndRefund($orderId, $operPin, $operRemark)
    {
        $operTime = date('Y-m-d H:i:s');
        return $this->post('ocs/' . __FUNCTION__, compact('orderId', 'operPin', 'operRemark', 'operTime'));
    }

    /**
     * 虚拟订单审核接口
     * @param $orderId
     * @param $agree
     * @param $operator
     * @param string $remark
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=8ccfe064380e4bbea25887adedaf2650
     */
    public function virtualOrderAudit($orderId, $agree, $operator, $remark = '')
    {
        $options = compact('orderId', 'agree', 'operator');
        if ($remark) {
            $options['remark'] = $remark;
        }
        return $this->post('ocs/' . __FUNCTION__, $options);
    }

    /**
     * 绑定第三方运单号接口
     * @param $orderId
     * @param $deliveryBillNo
     * @param $thirdDeliveryCompany
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=4bbf6ad4d05d4fd89622cea515242aae
     */
    public function bandThirdDeliverNoApiPlatform($orderId, $deliveryBillNo, $thirdDeliveryCompany)
    {
        return $this->post('ocs/' . __FUNCTION__, compact('orderId', 'deliveryBillNo', 'thirdDeliveryCompany'));
    }

    /**
     * 生成退差价逆向单接口
     * @param $orderId
     * @param array $refDiffAdjustSkuList
     * @param $specialLogicFlag
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=74ed627f2d2c45dbb804c900159e4c6a
     */
    public function generateReverseOrder($orderId, array $refDiffAdjustSkuList, $specialLogicFlag = 1)
    {
        return $this->post('reverse/' . __FUNCTION__, compact('orderId', 'refDiffAdjustSkuList', 'specialLogicFlag'));
    }

    /**
     * 生成退差价逆向单接口
     * @param $orderId
     * @param array $refDiffReverseOrderId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=de732732d2b440709a4164bb430033a8
     */
    public function queryReverseOrder($orderId, array $refDiffReverseOrderId)
    {
        $options = compact('orderId');
        if ($refDiffReverseOrderId) {
            $options = compact('refDiffReverseOrderId');
        }
        return $this->post('reverse/' . __FUNCTION__, $options);
    }

    /**
     * 柜机取件码同步接口
     * @param $orderId
     * @param $pickupCode
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=169&apiid=bf6528911f0946caa747f28cd701d06d
     */
    public function syncCabinetMachinePickupCode($orderId, $pickupCode)
    {
        return $this->post('order/' . __FUNCTION__, compact('orderId', 'pickupCode'));
    }
}