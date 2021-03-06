<?php

namespace Qbhy\OpenTaobao;

use Hanson\Foundation\Foundation;

/**
 * @property-read Http $http
 * @property-read AccessToken $access_token
 *
 * @property-read Tbk $tbk 淘宝客API
 * @property-read User $user 用户API
 */
class OpenTaobao extends Foundation
{
    protected $providers = [
        ServiceProvider::class,
    ];

    public function getSecret()
    {
        return $this->getConfig('app_secret');
    }

    public function getAppKey()
    {
        return $this->getConfig('app_key');
    }

    /*
     * 通用方法
     */
    public function request($method, array $data)
    {
        return $this->http->exec($method, $data);
    }


}