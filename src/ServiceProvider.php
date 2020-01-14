<?php


namespace Qbhy\OpenTaobao;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['access_token'] = function () {
            return new AccessToken();
        };

        $pimple['http'] = function (OpenTaobao $openTaobao) {
            return new Http($openTaobao);
        };
    }

}