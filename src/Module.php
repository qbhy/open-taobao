<?php


namespace Qbhy\OpenTaobao;


abstract class Module
{
    protected $app;

    public function __construct(OpenTaobao $app)
    {
        $this->app = $app;
    }
}