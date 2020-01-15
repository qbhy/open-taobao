<?php

namespace OpenTaobao\Tests\Unit;

use OpenTaobao\Tests\TestCase;

class TbkTest extends TestCase
{
    public function testGetRecommends()
    {
        ($result = $this->getApp()->tbk->getRecommends('123', 'title'));

        $this->assertTrue(empty($result['error_response']));
    }

    public function testSearchMaterial()
    {
        ($result = $this->getApp()->tbk->searchMaterial(getenv('taobao.adZoneId'), ['q' => '运动鞋']));

        $this->assertTrue(empty($result['error_response']));
    }
}