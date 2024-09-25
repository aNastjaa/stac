<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    protected $proxies;
    protected $headers;

    public function __construct()
    {
        $this->proxies = '*'; // Trust all proxies for development
        $this->headers = Request::HEADER_X_FORWARDED_ALL;
    }
}
