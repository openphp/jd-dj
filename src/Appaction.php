<?php

namespace Openphp\JdDj;

use RuntimeException;
use Openphp\JdDj\Request\AfterSales;
use Openphp\JdDj\Request\EasyPurchase;
use Openphp\JdDj\Request\Finance;
use Openphp\JdDj\Request\Goods;
use Openphp\JdDj\Request\Order;
use Openphp\JdDj\Request\Platform;
use Openphp\JdDj\Request\Price;
use Openphp\JdDj\Request\Promotion;
use Openphp\JdDj\Request\Stock;
use Openphp\JdDj\Request\Store;


/**
 * Class Appaction
 * @property Goods        $goods 商品类
 * @property Store        $store 门店类
 * @property price        $price 价格类
 * @property Stock        $stock 库存类
 * @property Order        $order 订单类
 * @property Promotion    $promotion 促销类
 * @property Finance      $finance 财务类
 * @property AfterSales   $afterSales 售后类
 * @property EasyPurchase $easyPurchase 轻松购
 * @property Platform     $platform 平台类
 */
class Appaction
{
    /**
     * @var array
     */
    protected $bind = [
        'goods'        => Goods::class,
        'store'        => Store::class,
        'price'        => Price::class,
        'stock'        => Stock::class,
        'order'        => Order::class,
        'promotion'    => Promotion::class,
        'finance'      => Finance::class,
        'afterSales'   => AfterSales::class,
        'easyPurchase' => EasyPurchase::class,
        'platform'     => Platform::class

    ];
    /**
     * @var array
     */
    protected $config = [];

    /**
     * @param $config
     */
    public function __construct($config = [])
    {
        $this->config = array_merge($this->config, $config);
    }
    
    /**
     * @param $abstract
     * @return mixed
     */
    protected function get($abstract)
    {
        if (isset($this->bind[$abstract])) {
            return new $this->bind[$abstract]($this->config);
        }
        if (is_subclass_of($abstract, Request::class)) {
            return new $abstract($this->config);
        }
        throw new RuntimeException('class not exists: ' . $abstract);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->get($name);
    }
}