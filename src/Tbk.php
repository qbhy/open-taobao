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
     * 淘宝客-推广者-物料搜索
     * @param string $adZoneId mm_xxx_xxx_12345678三段式的最后一段数字
     * @param array $params 参数太多了，看链接 https://open.taobao.com/api.htm?docId=35896&docType=2
     * @return array
     */
    public function searchMaterial($adZoneId, array $params)
    {
        return $this->exec('taobao.tbk.dg.material.optional', array_merge($params, ['adzone_id' => $adZoneId]));
    }

}