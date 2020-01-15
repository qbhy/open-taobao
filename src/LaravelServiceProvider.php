<?php
/**
 * User: qbhy
 * Date: 2019/1/16
 * Time: 下午2:14
 */

namespace Qbhy\OpenTaobao;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

/**
 * Class LaravelServiceProvider
 *
 * @author  qbhy <96qbhy@gmail.com>
 *
 * @package Qbhy\BaiduAIP
 */
class LaravelServiceProvider extends BaseServiceProvider
{
    public function boot()
    {

    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = dirname(__DIR__) . '/config/taobao.php';
        if ($this->app->runningInConsole()) {
            $this->publishes([$source => base_path('config/taobao.php')], 'taobao');
        }

        if ($this->app instanceof LumenApplication) {
            $this->app->configure('taobao');
        }

        $this->mergeConfigFrom($source, 'taobao');
    }

    public function register()
    {
        $this->setupConfig();

        $this->app->singleton(OpenTaobao::class, function ($app) {
            return new OpenTaobao(config('taobao'));
        });

        $this->app->alias(OpenTaobao::class, 'open.taobao');
    }
}