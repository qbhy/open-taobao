<?php

namespace Qbhy\OpenTaobao;


/**
 * 淘宝客API
 * Class Tbk
 * @package Qbhy\OpenTaobao
 */
class Tbk extends Module
{
    /**
     * 淘宝客-公用-商品关联推荐
     * @param string $numIid 商品Id
     * @param string $fields 需返回的字段列表
     * @param int $count 返回数量，默认20，最大值40
     * @param int $platform 链接形式：1：PC，2：无线，默认：１
     * @return array
     */
    public function itemRecommends($numIid, $fields, $count = 20, $platform = 1)
    {
        return $this->exec('taobao.tbk.item.recommend.get', [
            'fields' => $fields,
            'num_iid' => $numIid,
            'count' => $count,
            'platform' => $platform,
        ]);
    }

    /**
     * 淘宝客-公用-淘宝客商品详情查询(简版)
     * @param string $numIids 商品ID串，用,分割，最大40个
     * @param int $platform 链接形式：1：PC，2：无线，默认：１
     * @param null $ip ip地址，影响邮费获取，如果不传或者传入不准确，邮费无法精准提供
     * @return array
     */
    public function itemInfo($numIids, $platform = 1, $ip = null)
    {
        return $this->exec('taobao.tbk.item.info.get', [
            'num_iids' => $numIids,
            'ip' => $ip,
            'platform' => $platform,
        ]);
    }

    /**
     * 淘宝客-推广者-店铺搜索
     * @param string $q 查询词
     * @param string $fields 需返回的字段列表
     * @param array $params
     * @return array
     */
    public function getShop($q, $fields, array $params = [])
    {
        return $this->exec('taobao.tbk.shop.get', array_merge(compact('q', 'fields'), $params));
    }

    /**
     * 淘宝客-公用-店铺关联推荐
     * @param string $userId 卖家Id
     * @param string $fields 需返回的字段列表
     * @param int $count 返回数量，默认20，最大值40
     * @param int $platform 链接形式：1：PC，2：无线，默认：１
     * @return array
     */
    public function shopRecommends($userId, $fields, $count = 20, $platform = 1)
    {
        return $this->exec('taobao.tbk.shop.recommend.get', [
            'user_id' => $userId,
            'fields' => $fields,
            'count' => $count,
            'platform' => $platform,
        ]);
    }

    /**
     * 淘宝客-推广者-选品库宝贝信息
     * @param string $adZoneId 推广位id，需要在淘宝联盟后台创建；且属于appkey备案的媒体id（siteid），如何获取adzoneid，请参考，http://club.alimama.com/read-htm-tid-6333967.html?spm=0.0.0.0.msZnx5
     * @param string $favoritesId 选品库的id
     * @param string $fields 需要输出则字段列表，逗号分隔
     * @param array $params 其余字段请查看 https://open.taobao.com/api.htm?docId=26619&docType=2
     * @return array
     */
    public function favoritesItems($adZoneId, $favoritesId, $fields, array $params = [])
    {
        return $this->exec('taobao.tbk.uatm.favorites.item.get', array_merge([
            'adzone_id' => $adZoneId,
            'favorites_id' => $favoritesId,
            'fields' => $fields,
        ], $params));
    }

    /**
     * 淘宝客-推广者-选品库宝贝列表
     * @param string $fields
     * @param array $params 其余字段请查看 https://open.taobao.com/api.htm?docId=26620&docType=2
     * @return array
     */
    public function favoritesList($fields, array $params = [])
    {
        return $this->exec('taobao.tbk.uatm.favorites.get', array_merge(compact('fields'), $params));
    }

    /**
     * 淘抢购api
     * @param string $adZoneId 推广位id（推广位申请方式：http://club.alimama.com/read.php?spm=0.0.0.0.npQdST&tid=6306396&ds=1&page=1&toread=1）
     * @param string $fields 需返回的字段列表
     * @param string $startTime 最早开团时间，示例：2016-08-09 09:00:00
     * @param string $endTime 最晚开团时间，示例：2016-08-09 09:00:00
     * @param array $params page_no、page_size
     * @return array
     */
    public function tqg(string $adZoneId, string $fields, string $startTime, string $endTime, array $params = [])
    {
        return $this->exec('taobao.tbk.ju.tqg.get', array_merge([
            'adzone_id' => $adZoneId,
            'fields' => $fields,
            'start_time' => $startTime,
            'end_time' => $endTime
        ], $params));
    }

    /**
     * 淘宝客-公用-链接解析出商品id
     * @param string $url 长链接或短链接
     * @return array
     */
    public function urlExtract(string $url)
    {
        return $this->exec('taobao.tbk.item.click.extract', ['click_url' => $url]);
    }

    /**
     * 淘宝客-公用-阿里妈妈推广券详情查询
     * @param array $params https://open.taobao.com/api.htm?docId=31106&docType=2
     * @return array
     */
    public function getCoupon(array $params)
    {
        return $this->exec('taobao.tbk.coupon.get', $params);
    }

    /**
     * 淘宝客-公用-淘口令生成
     * @param string $text 口令弹框内容
     * @param string $url 口令跳转目标页
     * @param array $params https://open.taobao.com/api.htm?docId=31127&docType=2
     * @return array
     */
    public function createTpwd(string $text, string $url, array $params = [])
    {
        return $this->exec('taobao.tbk.tpwd.create', array_merge(compact('text', 'url'), $params));
    }

    /**
     * @param string $adZoneId 推广位
     * @param array $params https://open.taobao.com/api.htm?docId=31137&docType=2
     * @return array
     */
    public function getContent(string $adZoneId, array $params = [])
    {
        return $this->exec('taobao.tbk.content.get', array_merge(['adzone_id' => $adZoneId], $params));
    }

    /**
     * 淘宝客-推广者-新用户订单明细查询
     * @param string $activityId 活动id， 活动名称与活动ID列表，请参见 https://tbk.bbs.taobao.com/detail.html?appId=45301&postId=8599277
     * @param array $params https://open.taobao.com/api.htm?docId=33892&docType=2
     * @return array
     */
    public function newUserOrder($activityId, array $params = [])
    {
        return $this->exec('taobao.tbk.dg.newuser.order.get', array_merge(['activity_id' => $activityId], $params));
    }

    /**
     * 淘宝客-推广者-物料精选
     * @param string $adZoneId mm_xxx_xxx_xxx的第三位
     * @param array $params https://open.taobao.com/api.htm?docId=33947&docType=2
     * @return array
     */
    public function materialOptimus($adZoneId, array $params = [])
    {
        return $this->exec('taobao.tbk.dg.optimus.material', array_merge(['adzone_id' => $adZoneId], $params));
    }

    /**
     * 淘宝客-推广者-物料搜索
     * @param string $adZoneId mm_xxx_xxx_12345678三段式的最后一段数字
     * @param array $params 参数太多了，看链接 https://open.taobao.com/api.htm?docId=35896&docType=2
     * @return array
     */
    public function searchMaterial($adZoneId, array $params)
    {
        return $this->exec('taobao.tbk.dg.material.optional', array_merge($params, ['adzone_id' => $adZoneId]));
    }

    /**
     * 淘宝客-推广者-拉新活动对应数据查询
     * @param string $activityId 活动id， 活动名称与活动ID列表，请参见https://tbk.bbs.taobao.com/detail.html?appId=45301&postId=8599277
     * @param array $params https://open.taobao.com/api.htm?docId=36836&docType=2
     * @return array
     */
    public function shoppingGuide(string $activityId, array $params = [])
    {
        return $this->exec('taobao.tbk.dg.newuser.order.sum', array_merge([
            'activity_id' => $activityId,
            'page_no' => $params['page_no'] ?? 1,
            'page_size' => $params['page_size'] ?? 20,
        ], $params));
    }

    /**
     * 淘宝客-推广者-图文内容效果数据
     * @param array $option https://open.taobao.com/api.htm?docId=37130&docType=2
     * @return array
     */
    public function getEffectContent(array $option = [])
    {
        return $this->exec('taobao.tbk.content.effect.get', compact('option'));
    }

    /**
     * 淘宝客-推广者-淘礼金创建
     * @param string $adZoneId 广告位
     * @param string $itemId 宝贝id
     * @param string $name 淘礼金名称，最大10个字符
     * @param int $totalNum 淘礼金总个数
     * @param float $perFace 单个淘礼金面额，支持两位小数，单位元
     * @param array $params https://open.taobao.com/api.htm?docId=40173&docType=2
     * @return array
     */
    public function createTlj(string $adZoneId, string $itemId, $name, $totalNum, $perFace, array $params = [])
    {
        return $this->exec('taobao.tbk.dg.vegas.tlj.create', array_merge([
            'adzone_id' => $adZoneId,
            'item_id' => $itemId,
            'total_num' => $totalNum,
            'name' => $name,
            'per_face' => $perFace,
            'user_total_win_num_limit' => $params['user_total_win_num_limit'] ?? 1,
            'security_switch' => $params['security_switch'] ?? true,
            'send_start_time' => $params['send_start_time'] ?? date('Y-m-d H:i:s'),
        ], $params));
    }

    /**
     * 淘宝客-推广者-官方活动转链
     * @param string $adZoneId 推广位id，mm_xx_xx_xx pid三段式中的第三段。adzone_id需属于appKey拥有者
     * @param string $promotionSceneId 官方活动ID，从官方活动页获取
     * @param array $params https://open.taobao.com/api.htm?docId=41918&docType=2
     * @return array
     */
    public function activityLink($adZoneId, $promotionSceneId, array $params = [])
    {
        return $this->exec('taobao.tbk.activitylink.get', array_merge([
            'adzon_id' => $adZoneId,
            'promotion_scene_id' => $promotionSceneId,
        ], $params));
    }

    /**
     * 淘宝客-服务商-官方活动转链
     * @param string $adZoneId 推广位id，mm_xx_xx_xx pid三段式中的第三段
     * @param string $siteId 推广位id，mm_xx_xx_xx pid三段式中的第二段
     * @param $promotionSceneId 官方活动ID，从官方活动页获取
     * @param array $params https://open.taobao.com/api.htm?docId=41921&docType=2
     * @return array
     */
    public function activityLinkTool($adZoneId, $siteId, $promotionSceneId, array $params = [])
    {
        return $this->exec('taobao.tbk.sc.activitylink.toolget', array_merge([
            'adzone_id' => $adZoneId,
            'promotion_scene_id' => $promotionSceneId,
            'site_id' => $siteId,
        ], $params));
    }

    /**
     * 淘宝客-推广者-处罚订单查询
     * @param array $option https://open.taobao.com/api.htm?docId=42050&docType=2
     * @return array
     */
    public function punishOrder(array $option = [])
    {
        return $this->exec('taobao.tbk.dg.punish.order.get', [
            'af_order_option' => $option
        ]);
    }

    /**
     * 淘宝客-推广者-淘礼金发放及使用报表
     * @param string $rights 实例ID
     * @return array
     */
    public function instanceRepoort(string $rights)
    {
        return $this->exec('taobao.tbk.dg.vegas.tlj.instance.report', [
            'rights_id' => $rights,
        ]);
    }

    /**
     * 媒体导购单选品
     * @param array $params
     * @return array
     */
    public function updateWish(array $params)
    {
        return $this->exec('taobao.tbk.dg.wish.update', ['param0' => $params]);
    }

    /**
     * 媒体淘客导购单查询
     * @param string $wishId 愿望ID
     * @return array
     */
    public function withList($wishId)
    {
        return $this->exec('taobao.tbk.dg.wish.list', ['param0' => ['with_list_id' => $wishId]]);
    }


}