<?php


namespace Qbhy\OpenTaobao;


class Http extends \Hanson\Foundation\Http
{
    /** @var OpenTaobao */
    protected $app;

    public function __construct(OpenTaobao $app)
    {
        $this->app = $app;
    }

    public function exec($method, array $data = [])
    {
        return $this->post('http://gw.api.taobao.com/router/rest', $this->buildParams(array_merge($data, compact('method'))));
    }

    protected function buildParams(array $params): array
    {
        $params = array_merge($params, [
            'app_key' => $this->app->getConfig('app_key'),
            'v' => '2.0',
            'format' => 'json',
            'sign_method' => 'md5',
            'timestamp' => date("Y-m-d H:i:s"),
        ]);
        $params['sign'] = $this->generateSign($params, $this->app->getConfig('app_secret'));
        return $params;
    }

    protected function generateSign(array $attributes, $secretKey)
    {
        ksort($attributes);

        $stringToBeSigned = $secretKey;
        foreach ($attributes as $k => $v) {
            if (!is_array($v) && "@" !== substr($v, 0, 1)) {
                $stringToBeSigned .= $k . $v;
            }
        }
        unset($k, $v);
        $stringToBeSigned .= $secretKey;

        return strtoupper(md5($stringToBeSigned));
    }
}