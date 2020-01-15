<?php

namespace OpenTaobao\Tests\Unit;

use OpenTaobao\Tests\TestCase;

class TbkTest extends TestCase
{
    public function testGetRecommends()
    {
        ($result = $this->getApp()->tbk->getRecommends('123', 'title'));

        $this->assertOk($result);
    }

    public function testItemInfo()
    {
        ($result = $this->getApp()->tbk->itemInfo('595866143271,586271415672',1, '113.111.4.58'));

        $this->assertOk($result);
    }

    public function testSearchMaterial()
    {
        ($result = $this->getApp()->tbk->searchMaterial(getenv('taobao.adZoneId'), ['q' => '运动鞋']));

        $this->assertOk($result);
    }
}