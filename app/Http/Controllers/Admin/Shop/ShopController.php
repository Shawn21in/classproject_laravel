<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Models\Admin\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function list(){
        $list = Shop::get();
        return view("admin.shop.list",compact("list"));
    }

    public function add(){
        return view("admin.shop.add");
    }

    public function insert(Request $req){
        $shop = new Shop();
        $shop->shopName = $req->shopName;
        $shop->save();

        Session::flash("message","已新增");
        return redirect("admin/shop");
    }

    public function edit(Request $req){
        $shop = Shop::find($req->id);
        return view("admin.shop.edit", compact("shop"));
    }

    public function update(Request $req){
        $shop = Shop::find($req->id);
        Session::flash("message",($req->shopName)."已修改");
        $shop->shopName = $req->shopName;
        $shop->save();

        
        return redirect("admin/shop");
    }

    public function delete(Request $req){
        $temp="";

        foreach($req->id as $id){
            $shop = Shop::find($id);
            $temp = $temp . $shop->shopName;
        }
        Shop::destroy($req->id);
        Session::flash("message",($temp)."已刪除");
        return redirect("/admin/shop");
    }

    public function check(Request $req)
    {
        $shop = (new Shop())->checkName($req->shopName);
        if(!empty($shop)){
            echo ("exist");
        }
    }
}
