<?php

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string
     */
     /*全プロキシを信用 → 記述したコードに問題なくてもさまざまなエラーや不具合を発生することがあるため、その対策
       プロキシとはサーバやコンピュータが接続されているネットワークから外部へ通信を行う際に、その通信を中継する機能のこと*/
    protected $proxies = '*';

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
