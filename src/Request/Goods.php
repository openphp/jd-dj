<?php

namespace Openphp\JdDj\Request;

use Openphp\JdDj\Request;

class Goods extends Request
{
    /**
     * 根据id查询商家的视频
     * @param string $productVideoId 到家返回的视频id
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=09b1895d0d51469aa58104549dc2e67e
     */
    public function getVideoInfoById($productVideoId)
    {
        return $this->post('pms/' . __FUNCTION__, compact('productVideoId'));
    }

    /**
     * 修改视频绑定状态
     * @param string $productVideoId 到家返回的视频id
     * @param array  $newBindingSkuIds 新绑定的skuId列表
     * @param array  $newBindingSpuIds 新绑定的SpuId列表
     * @param array  $unBindingSkuIds 解绑的skuId列表
     * @param array  $unBindingSpuIds 解绑的spuId列表
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=250f393adcd84cf7a9a5815a138406da
     */
    public function updateBindingStatus($productVideoId, array $newBindingSkuIds = [], array $newBindingSpuIds = [], array $unBindingSkuIds = [], array $unBindingSpuIds = [])
    {
        return $this->post('pms/' . __FUNCTION__, compact('productVideoId', 'newBindingSkuIds', 'newBindingSpuIds', 'unBindingSkuIds', 'unBindingSpuIds'));
    }

    /**
     * 获取SPU基本信息
     * @param string $outSuperId 商家SPU编码
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=2bae152245974fa187463810a07c1583
     */
    public function getSpuInfo($outSuperId)
    {
        return $this->post('pms/' . __FUNCTION__, compact('outSuperId'));
    }

    /**
     * 通过url上传商品视频接口
     * @param $videoList
     * [['videoName'=>'','orgVideoUrl'=>'','videoSize'=>'']]
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=32005c6655d04ef79d005d517622b314
     */
    public function uploadVideo($videoList)
    {
        return $this->post('pms/' . __FUNCTION__, compact('videoList'));
    }

    /**
     * 视频删除接口
     * @param string $productVideoId 到家返回的视频id
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=40f28ad1612343c98df79addd913f7a6
     */
    public function deleteVideo($productVideoId)
    {
        return $this->post('pms/' . __FUNCTION__, compact('productVideoId'));
    }

    /**
     * 批量根据jdSkuId查询到家skuId
     * @param array $jdSkuIds 京东skuId集合，最多不能超过50个
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=769f44172bb54400adb727d80187e259
     */
    public function queryDjSkuInfos(array $jdSkuIds)
    {
        return $this->post('pms/' . __FUNCTION__, compact('jdSkuIds'));
    }

    /**
     * 查询违规商品信息接口
     * @param array $skuIds 到家商品编码
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=f64930ff95ba49ee8afe4aa29ff6d3fd
     */
    public function listSkuManageReason(array $skuIds)
    {
        return $this->post('pms/' . __FUNCTION__, compact('skuIds'));
    }

    /**
     * 新增商家店内分类信息接口
     * @param int    $pid 若增加一级店内分类，其父级分类ID为0；若在已有一级店内分类下增加二级店内分类，则pid为该一级店内分类id；若在已有二级店内分类下增加三级店内分类，则pid为该二级店内分类id。
     * @param string $shopCategoryName 店内分类名称(店内分类名称应在1-12个字符之间 名称只允许中文、英文、数字)不能有特殊符号。
     * @param int    $shopCategoryLevel 店内分类等级
     * @param string $createPin 创建人
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=de26f24a62aa47a49e5ab7579d638cb3
     */
    public function addShopCategory($pid, $shopCategoryName, $shopCategoryLevel = 0, $createPin = '')
    {
        $options = compact('pid', 'shopCategoryName');
        if ($shopCategoryLevel > 0) {
            $options['shopCategoryLevel'] = $shopCategoryLevel;
        }
        if ($createPin) {
            $options['createPin'] = $createPin;
        }
        return $this->post('pms/' . __FUNCTION__, $options);
    }


    /**
     * 修改商家店内分类信息接口
     * @param string $id 店内分类编号
     * @param string $shopCategoryName 店内分类名称
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=1de278c670b64da492f676ab78d62f73
     */
    public function updateShopCategory($id, $shopCategoryName)
    {
        return $this->post('pms/' . __FUNCTION__, compact('id', 'shopCategoryName'));
    }

    /**
     * 删除商家店内分类接口
     * @param string $id 店内分类编码
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=c17b96e9fe254b2a8574f6d1bc0c1667
     */
    public function delShopCategory($id)
    {
        return $this->post('pms/' . __FUNCTION__, compact('id'));
    }

    /**
     * 修改商家店内分类顺序接口
     * @param string $pid 父级店内分类编码；如果调整一级店内分类顺序，父级分类传0即可。
     * @param string $childIds 12,56,34    子级店内分类集合；按照填写的分类编号顺序对分类顺序进行调整；该父分类下所有子分类都必须传入。
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=2a8267602e814be9828f0c7ce307b872
     */
    public function changeShopCategoryOrder($pid, $childIds)
    {
        return $this->post('pms/' . __FUNCTION__, compact('pid', 'childIds'));
    }

    /**
     * 查询商家店内分类信息接口
     * @param string $fields 定义需要返回的字段列表；所有字段列表：ID--商家店内分类编号,PID--父级店内分类编号,SHOP_CATEGORY_NAME--店内分类名称,SHOP_CATEGORY_LEVEL--店内分类级别,SORT--店内分类排序
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=964f2d248a7e42b196be2ab35b4e93b4
     */
    public function queryCategoriesByOrgCode($fields)
    {
        return $this->post('pms/' . __FUNCTION__, compact('fields'));
    }

    /**
     * 分页查询商品品牌信息接口
     * @param int    $pageNo 页码
     * @param int    $pageSize 每页查询数量(最大值50)
     * @param string $brandName 品牌名称(模糊查询);不传代表查询所有
     * @param string $brandId 到家品牌编码
     * @param string $fields 定义需要返回的字段列表；所有字段列表：BRAND_ID--品牌编号,BRAND_NAME--品牌名称,BRAND_STATUS--品牌状态(1已禁用，2启用中)
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=1ca07a3e767649a7a44fc6ea7e9ed8dd
     */
    public function queryPageBrandInfo($pageNo = 1, $pageSize = 50, $brandName = '', $brandId = '', $fields = 'BRAND_ID,BRAND_NAME,BRAND_STATUS')
    {
        $options = compact('pageNo', 'pageSize');
        if ($brandName) {
            $options['brandName'] = $brandName;
        }
        if ($brandId) {
            $options['brandId'] = $brandId;
        }
        if ($fields) {
            $options['fields'] = $fields;
        }
        return $this->post('pms/' . __FUNCTION__, $options);
    }

    /**
     * 获取京东到家类目信息接口
     * @param string $id 父类目ID（获取一级类目时该字段传0，即ID=0）
     * @param string $fields 自定义需要返回的字段列表；所有字段列表：ID--类目ID,PID--父类目ID,CATEGORY_NAME--类目名称,CATEGORY_LEVEL--类目等级,CATEGORY_STATUS--类目状态(0禁用，1启用),FULLPATH--完整类目层级关系
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=d287d326124d42c090cff03c16385706
     */
    public function queryChildCategoriesForOP($id, $fields = 'BRAND_ID,BRAND_NAME,BRAND_STATUS')
    {
        return $this->post('api/' . __FUNCTION__, compact('id', 'fields'));
    }

    /**
     * 新版新增商品信息接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=15d4b89c8ae14f469a65e915bd7bdb2d
     */
    public function addSku(array $options)
    {
        return $this->post('pms/' . __FUNCTION__, $options);
    }

    /**
     * 根据商品UPC码批量新增商品接口
     * @param array $openBatchAddSkuRequests
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=c4520585f28246338895d02b6d90d3a3
     */
    public function batchAddSku(array $openBatchAddSkuRequests)
    {
        $traceId = md5(date('Y-m-d H:i:s') . uniqid('Openphp.top'));
        return $this->post('pms/' . __FUNCTION__, compact('traceId', 'openBatchAddSkuRequests'));
    }

    /**
     * 新版查询商品创建状态接口
     * @param string $outSkuId 商家skuId编码（商家skuId）
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=0a97930f0a7147d5a9feeb7bffb8fd8d
     */
    public function getSkuStatus($outSkuId)
    {
        $traceId = md5(date('Y-m-d H:i:s') . uniqid('Openphp.top'));
        return $this->post('pms/' . __FUNCTION__, compact('traceId', 'outSkuId'));
    }

    /**
     * 新版根据商家商品编码修改商品信息接口
     * @param string $outSkuId 商家skuId编码（商家skuId）
     * @param array  $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=32de39cd49104749b059942070458c51
     */
    public function updateSku($outSkuId, array $options)
    {
        $traceId = md5(date('Y-m-d H:i:s') . uniqid('Openphp.top'));
        $options = array_merge(compact('traceId', 'outSkuId'), $options);
        return $this->post('pms/' . __FUNCTION__, $options);
    }

    /**
     * 查询商品图片处理结果接口
     * @param string $skuIds 京东到家商品编码列表,单次最大25个商品
     * @param int    $imgType 图片类型 1：商品图片 2：商品描述图片
     * @param int    $handleStatus 处理状态,0:待处理,1: 成功,4:连接异常,5:IO异常,6:外部服务器异常,9:上传文件失败,10:图片格式错误,11:图片生成错误,100:其他错误
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=17506653e03542f9a49023711780c30d
     */
    public function queryListBySkuIds($skuIds, $imgType = 0, $handleStatus = 0)
    {
        $options = compact('skuIds');
        if ($imgType) {
            $options['imgType'] = $imgType;
        }
        if ($handleStatus) {
            $options['handleStatus'] = $handleStatus;
        }
        return $this->post('order/' . __FUNCTION__, $options);
    }

    /**
     * 根据到家商品编码批量更新商家商品编码接口
     * @param array $skuInfoList 需要更新的商品信息列表(最多50条)
     * [['skuId'=>'','outSkuId'=>'']]
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=4155d29bbdf649b69c67473b705ce7e7
     */
    public function batchUpdateOutSkuId(array $skuInfoList)
    {
        return $this->post('sku/' . __FUNCTION__, compact('skuInfoList'));
    }

    /**
     * 查询商家已上传商品信息列表接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=e433b95f74524dab91718432c0358977
     */
    public function querySkuInfos(array $options)
    {
        return $this->post('pms/' . __FUNCTION__, $options);
    }

    /**
     * 根据三级类目ID查询类目属性字典信息接口
     * @param string $categoryId 三级类目
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=773b04c3dd5a4ad4bdae28b4d4a00604
     */
    public function getSkuCategoryAttrByCategoryId($categoryId)
    {
        return $this->post('pms/' . __FUNCTION__, compact('categoryId'));
    }

    /**
     * 查询类目属性字典信息接口
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=66abea97d2ee4dd1a8be42b95d40fbae
     */
    public function getAllSkuCategoryAttr()
    {
        return $this->post('pms/' . __FUNCTION__, []);
    }

    /**
     * 新增商品类目属性值信息接口
     * @param string $skuId
     * @param array  $valuesRequests
     * [['key'=>'','value'=>'']]
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=bb58192415e14a2283ef548938b208a1
     */
    public function addSkuCateAttrValue($skuId, array $valuesRequests)
    {
        return $this->post('pms/' . __FUNCTION__, compact('skuId', 'valuesRequests'));
    }

    /**
     * 更新商品类目属性值信息接口
     * @param string $skuId
     * @param array  $valuesRequests
     * @return mixed https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=c9e6ebe4580f46d398ec69c2c4862408
     * @see
     */
    public function updateSkuCateAttrValue($skuId, array $valuesRequests)
    {
        return $this->post('pms/' . __FUNCTION__, compact('skuId', 'valuesRequests'));
    }

    /**
     * 根据商品查询类目属性值信息接口
     * @param $skuId
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=d040335ce2d04ef09e2b27106d4a671a
     */
    public function getSkuCateAttrValuesBySkuId($skuId)
    {
        return $this->post('pms/' . __FUNCTION__, compact('skuId'));
    }

    /**
     * 删除商品类目属性值信息接口
     * @param       $skuId
     * @param array $valuesRequests
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=7e4382ce678e467ea972ce033493808e
     */
    public function deleteSkuCateAttrValue($skuId, array $valuesRequests)
    {
        return $this->post('pms/' . __FUNCTION__, compact('skuId', 'valuesRequests'));
    }

    /**
     * 根据平台类目id查询类目销售属性
     * @param string $categoryId 三级类目id
     * @param string $source 调用来源，只能填000005
     * @param string $accessToken 接口认证码,只能填O2O_API_OPEN_PLAT
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=34a8d4ac5f5e465ab6de032a89817999
     */
    public function queryPmsCategorySaleAttr($categoryId, $source = '000005', $accessToken = 'O2O_API_OPEN_PLAT')
    {
        return $this->post('OpenPmsCategorySaleAttrService/' . __FUNCTION__, compact('categoryId', 'source', 'accessToken'));
    }

    /**
     * 新增SPU信息接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=e30936da75294e55bcfdabb92c3815bc
     */
    public function addSpu(array $options)
    {
        return $this->post('pms/' . __FUNCTION__, $options);
    }

    /**
     * 批量更新商家商品SPU编码接口
     * @param array $batchSpuRequestList
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=fa3cc06a2ecb446988889933f49c77f0
     */
    public function batchUpdateOutSuperId(array $batchSpuRequestList)
    {
        return $this->post('pms/' . __FUNCTION__, compact('batchSpuRequestList'));
    }

    /**
     * 追加新的SKU到指定的SPU接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=cffb839b06f042b28d6397b6bd4f2676
     */
    public function appendSku(array $options)
    {
        return $this->post('pms/' . __FUNCTION__, $options);
    }

    /**
     * 更新SPU基础信息接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=3816c5eadc5d4f268f760cac14483ec0
     */
    public function updateSpu(array $options)
    {
        return $this->post('pms/' . __FUNCTION__, $options);
    }

    /**
     * 更新SPU下指定SKU的基础信息接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=8be2b5d153044179a13089e7f19e24e6
     */
    public function updateSkuBaseInfo(array $options)
    {
        return $this->post('pms/' . __FUNCTION__, $options);
    }

    /**
     * 更新SPU销售属性信息接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=5c48e180455f4d76bfd75b3e496337ac
     */
    public function updateSpuSaleAttr(array $options)
    {
        return $this->post('pms/' . __FUNCTION__, $options);
    }

    /**
     * 追加新的SPU销售属性信息接口
     * @param array $options
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=35079569a7ee43d2a1fb070dad5d4dc4
     */
    public function appendSpuSaleAttr(array $options)
    {
        return $this->post('pms/' . __FUNCTION__, $options);
    }


    /**
     * 查询SPU下所有的销售属性信息接口
     * @param string $outSuperId 外部商家SPU编码
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=95e70cfb317c46c6b4e1adaf9dbbeced
     */
    public function getSpuSaleAttr($outSuperId)
    {
        return $this->post('pms/' . __FUNCTION__, compact('outSuperId'));
    }

    /**
     * 查询SPU创建状态接口
     * @param string $outSuperId 外部商家SPU编码
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=448ba8ee82eb40958318bb84f2efc9c2
     */
    public function getSpuStatus($outSuperId)
    {
        return $this->post('pms/' . __FUNCTION__, compact('outSuperId'));
    }

    /**
     * 商家商品状态检查接口
     * @param string $storeId 到家门店编码
     * @param string $skuId 到家商品编码
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=a348122182ef459982cae1280407ff17
     */
    public function getProductStatus($storeId, $skuId)
    {
        return $this->post('search/' . __FUNCTION__, compact('storeId', 'skuId'));
    }


    /**
     * 商家商品状态检查接口
     * @param string $storeId 到家门店编码
     * @param string $skuId 到家商品编码
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=5e29d6c9317847e58b8cbcc70702fd52
     */
    public function syncProduct($storeId, $skuId)
    {
        return $this->post('search/' . __FUNCTION__, compact('storeId', 'skuId'));
    }

    /**
     * 分页查询京东到家商品前缀库接口
     * @param string $keyValue 根据前缀名称，模糊查询；不填代表查询所有
     * @param array  $fields 定义需要返回的字段列表；所有字段列表：ID--前缀ID,KEYVALUE--前缀名称
     * @param int    $pageNo 页码 每页查询数量
     * @param int    $pageSize
     * @return mixed
     * @see https://opendj.jd.com/staticnew/widgets/resources.html?groupid=180&apiid=2195b87baf0c4783bb1a4fda35aea7d1
     */
    public function queryKeyWordDicInfo($keyValue, $fields, $pageNo = 1, $pageSize = 20)
    {
        return $this->post('search/' . __FUNCTION__, compact('keyValue', 'fields', 'pageNo', 'pageSize'));
    }
}