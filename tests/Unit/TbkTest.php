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

    public function testTqg()
    {
        ($result = $this->getApp()->tbk->tqg(getenv('taobao.adZoneId'), 'click_url,pic_url,reserve_price,zk_final_price,total_amount,sold_num,title,category_name,start_time,end_time', '2016-08-09 09:00:00', date('Y-m-d H:i:s')));

        $this->assertOk($result);
    }

    public function testUrlExtract()
    {
        ($result = $this->getApp()->tbk->urlExtract("https://s.click.taobao.com/t?e=m%3D2%26s%3DykVdG%2FSTWGYcQipKwQzePOeEDrYVVa64yK8Cckff7TVRAdhuF14FMUx2oa22hBKot4hWD5k2kjN9z6VOy6%2FO%2BmeGYUoL%2FvPD88zN0I43T14HR6oXjs5UWvpYwDqYGcT3IWLb4DzFlElvJrMBQHqrMC5iLofPfeZ0kxF7PgHWkpZ2xS2nx57oEz4hwuVIl3bvk1ghiT6uV651IdtMHONLYcYMXU3NNCg%2F&union_lens=lensId:0bb790e7_0d65_16fa8285766_9036"));

        $this->assertOk($result);
    }

    public function testGetCoupon()
    {
        ($result = $this->getApp()->tbk->getCoupon(['item_id' => 595866143271]));

        $this->assertOk($result);
    }

    public function testCreateTpwd()
    {
        $url = 'https://s.click.taobao.com/t?e=m%3D2%26s%3DykVdG%2FSTWGYcQipKwQzePOeEDrYVVa64yK8Cckff7TVRAdhuF14FMUx2oa22hBKot4hWD5k2kjN9z6VOy6%2FO%2BmeGYUoL%2FvPD88zN0I43T14HR6oXjs5UWvpYwDqYGcT3IWLb4DzFlElvJrMBQHqrMC5iLofPfeZ0kxF7PgHWkpZ2xS2nx57oEz4hwuVIl3bvk1ghiT6uV651IdtMHONLYcYMXU3NNCg%2F&union_lens=lensId:0bb790e7_0d65_16fa8285766_9036';
        ($result = $this->getApp()->tbk->createTpwd('测试内容1', $url));

        $this->assertOk($result);
    }

    public function testGetContent()
    {
        ($result = $this->getApp()->tbk->getContent(getenv('taobao.adZoneId')));

        $this->assertOk($result);
    }

    public function testNewUserOrder()
    {
        ($result = $this->getApp()->tbk->newUserOrder(getenv('taobao.activityId') ?: '119013_2'));

        $this->assertOk($result);
    }

    public function testMaterialOptimus()
    {
        ($result = $this->getApp()->tbk->materialOptimus(getenv('taobao.adZoneId')));

        $this->assertOk($result);
    }

    public function testSearchMaterial()
    {
        ($result = $this->getApp()->tbk->searchMaterial(getenv('taobao.adZoneId'), ['q' => '运动鞋']));

        $this->assertOk($result);
    }

    public function testShoppingGuide()
    {
        ($result = $this->getApp()->tbk->shoppingGuide(getenv('taobao.activityId')));

        $this->assertOk($result);
    }

    public function testCreateTlj()
    {
        ($result = $this->getApp()->tbk->createTlj(getenv('taobao.adZoneId'), '595866143271', '测试淘礼金', 10, 1));

        $this->assertOk($result);
    }
}