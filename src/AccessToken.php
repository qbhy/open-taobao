<?php

namespace Qbhy\OpenTaobao;

use Hanson\Foundation\AbstractAccessToken;

class AccessToken extends AbstractAccessToken
{
    public function getTokenFromServer()
    {
        return $this->getHttp();
    }

    public function checkTokenResponse($result)
    {
        // TODO: Implement checkTokenResponse() method.
    }

}