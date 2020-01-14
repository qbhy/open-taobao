<?php

namespace Qbhy\OpenTaobao;


/**
 * 淘宝客API
 * Class Tbk
 * @package Qbhy\OpenTaobao
 */
class Tbk extends Module
{
    public function getRecommends($numIid, $fields, $count = 20, $platform = 1)
    {
        return $this->exec('taobao.tbk.item.recommend.get', [
            'fields' => $fields,
            'num_iid' => $numIid,
            'count' => $count,
            'platform' => $platform,
        ]);
    }

    public function searchMaterial($adZoneId, array $params)
    {
        return $this->exec('taobao.tbk.dg.material.optional', array_merge($params, ['adzone_id' => $adZoneId]));
    }


}