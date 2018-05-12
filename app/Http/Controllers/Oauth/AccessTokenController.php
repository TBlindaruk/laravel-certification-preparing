<?php

namespace App\Http\Controllers\Oauth;

use Laravel\Passport\Http\Controllers\AccessTokenController as BaseAccessTokenController;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class AccessTokenController
 *
 * @package App\Http\Controllers\Oauth
 */
class AccessTokenController extends BaseAccessTokenController
{
    /**
     * @param ServerRequestInterface $request
     *
     * @return \Illuminate\Http\Response
     */
    public function issueToken(ServerRequestInterface $request)
    {
        return parent::issueToken($request);
    }
}