<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product\ProductShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function add(Request $req)
    {
        $product_id = $req->product_id;
        $list = (new ProductShop())->getAddShop($product_id);

        return view("admin.productShop.add",compact("product_id","list"));

    }

    public function insert(Request $req){
        $shop = new ProductShop();
        $shop->product_id = $req->product_id;
        $shop->shop_id = $req->shop_id;
        $shop->url = $req->url;
        $shop->save();

        Session::flash("message", "商店以新增");
        return redirect("/admin/product/edit/" . $req->product_id . "#tabs-4"); 
    }

    public function edit(Request $req){
        $product_id = $req->product_id;
        $id = $req->id;

        $shop = ProductShop::find($id);
        $shopname = (new ProductShop())->getshopname($shop->shop_id);
        return view("admin.productShop.edit",compact("product_id","id","shop","shopname"));
    }

    public function update(Request $req){
        $product_id =$req->product_id;
        $id = $req->id;

        $shop = ProductShop::find($id);
        $temp = $shop->url;
        $shop->url =$req->url;
        $shop->save();

        Session::flash("message", $temp."規格已修改為".($req->url));
        return redirect("/admin/product/edit/" . $product_id . "#tabs-4");
    }

    public function delete(Request $req){
        $product_id ="";
        if(!empty($req->shop_id)){
            foreach($req->shop_id as $shop_id){
                $shop = ProductShop::find($shop_id);
                $product_id = $shop->product_id;
                $shop->delete();
            }

            Session::flash("message", "產品商店已刪除");
            return redirect("/admin/product/edit/" . $product_id . "#tabs-4"); 

        }else{
            Session::flash("message", "請選擇要刪除的商店");
            return redirect()->back();
        }
    }
}
