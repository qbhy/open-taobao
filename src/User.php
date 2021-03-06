<?php

namespace Qbhy\OpenTaobao;

class User extends Module
{
    /**
     * 淘宝客-推广者-商品链接转换
     * @param $numIid
     * @param $fields
     * @param  string  $adzoneId
     * @param  array  $params  https://open.taobao.com/api.htm?spm=a219a.7386653.0.0.1c41669a9j6vY4&source=search&docId=24516&docType=2
     * @return array $params
     */
    public function itemConvert(array $numIid, $adzoneId, $fields = 'num_iid,click_url', array $params = [])
    {
        return $this->exec('taobao.tbk.item.convert', array_merge($params, [
            'fields' => $fields,
            'num_iid' => implode(',', $numIid),
            'adzone_id' => $adzoneId
        ]));
    }

    /**
     * 淘宝客-推广者-店铺链接转换
     * @param $users
     * @param $fields
     * @param  string  $adzoneId
     * @param  array  $params  https://open.taobao.com/api.htm?spm=a219a.7386653.0.0.3119669aIZOuQE&source=search&docId=24523&docType=2
     * @return array $params
     */
    public function shopConvert(array $users, $fields, $adzoneId, array $params = [])
    {
        return $this->exec('taobao.tbk.shop.convert', array_merge($params, [
            'fields' => $fields,
            'num_iid' => implode(',', $users),
            'adzone_id' => $adzoneId
        ]));
    }

    /**
     * 淘宝客-推广者-轻店铺淘口令解析
     * @see https://open.taobao.com/api.htm?spm=a219a.7386797.0.0.3b0d669asTBnie&source=search&docId=40407&docType=2
     * @param $wd
     * @param $adZoneId
     * @param $mainPid
     * @return array
     */
    public function tbpswdParse($wd, $adZoneId, $mainPid)
    {
        return $this->exec('taobao.tbk.lightshop.tbpswd.parse', [
            'tao_password' => $wd,
            'adzone_id' => $adZoneId,
            'main_pid' => $mainPid,
        ]);
    }


}