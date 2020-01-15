<?php

namespace OpenTaobao\Tests;

use Qbhy\OpenTaobao\OpenTaobao;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected $app;


    public function getApp()
    {
        return $this->app ?: $this->app = new OpenTaobao([
            'debug' => true,
            'app_key' => getenv('taobao.key'),
            'app_secret' => getenv('taobao.secret'),
        ]);
    }
}