<?php

namespace OpenTaobao\Tests\Unit;

use OpenTaobao\Tests\TestCase;

class TbkTest extends TestCase
{
    public function testItemRecommends()
    {
        ($result = $this->getApp()->tbk->itemRecommends('595866143271', 'title'));

        $this->assertOk($result);
    }

    public function testItemInfo()
    {
        ($result = $this->getApp()->tbk->itemInfo('595866143271,586271415672', 1, '113.111.4.58'));

        $this->assertOk($result);
    }

    public function testGetShop()
    {
        ($result = $this->getApp()->tbk->getShop('apple', 'user_id,shop_title,shop_type,seller_nick,pict_url,shop_url'));

        $this->assertOk($result);
    }

    public function testShopRecommends()
    {
        ($result = $this->getApp()->tbk->shopRecommends('225431407', 'user_id,shop_title,shop_type,seller_nick,pict_url,shop_url'));

        $this->assertOk($result);
    }


    public function testFavoritesList()
    {
        ($result = $this->getApp()->tbk->favoritesList('favorites_title,favorites_id,type'));

        $this->assertOk($result);
    }

    public function testFavoritesItems()
    {
        ($result = $this->getApp()->tbk->favoritesItems(getenv('taobao.adZoneId'), getenv('taobao.favoritesId'), 'num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick,shop_title,zk_final_price_wap,event_start_time,event_end_time,tk_rate,status,type'));

        $this->assertOk($result);
    }

    public function testSearchMaterial()
    {
        ($result = $this->getApp()->tbk->searchMaterial(getenv('taobao.adZoneId'), ['q' => '运动鞋']));

        $this->assertOk($result);
    }
}