<?php

namespace OpenTaobao\Tests\Unit;

use OpenTaobao\Tests\TestCase;

class UserTest extends TestCase
{
    public function testItemRecommends()
    {
        ($result = $this->getApp()->user->itemConvert(['575962541053'], getenv('taobao.adZoneId')));

        $this->assertOk($result);
    }
}