<?php


namespace Qbhy\OpenTaobao;


abstract class Module
{
    protected $app;

    public function __construct(OpenTaobao $app)
    {
        $this->app = $app;
    }

    /**
     * @param $method
     * @param array $data
     * @return array
     */
    public function exec($method, array $data = [])
    {
        return $this->app->http->exec($method, $data);
    }
}