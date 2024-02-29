<?php

namespace App\Http\Middleware;

use App\Models\Admin\Type\TypeLayer1;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Info
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if(empty(session()->get("info")))
        {
            // 取得大分類
            session()->put("type_layer1",TypeLayer1::get());
            // 以後可在加logo 功能選單 footer等 或流量計數器
            
            //表示已取得資料,除非資料也變動，才會再次取得資料
            session()->put("info", "Y");
        }
        return $next($request);
    }
}
