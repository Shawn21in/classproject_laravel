<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Models\Admin\Product\Product;
use App\Models\Admin\Product\ProductContent;
use App\Models\Admin\Product\ProductPhoto;
use App\Models\Admin\Product\ProductShop;
use App\Models\Admin\Product\ProductSpec;
use App\Models\Admin\Type\TypeLayer1;
use Illuminate\Http\Request;

class ProductController extends Controller
{   
    public function getList(Request $req){
        $list = (new Product())->getType_layer1Product($req->type_layer1);
        return response()->json($list);
    }
    
    public function list(Request $req){
        $list = (new Product())->getType_layer1Product($req->type_layer1);
        $banner = (new Banner())->getBanner(1);
        return view("front.product.list",compact("list","banner"));
    }

    public function detail(Request $req)
    {
       $type_layer1 = TypeLayer1::find($req->type_layer1);
       $id = $req->id;
       
       $product = Product::find($id);
       $photo = (new ProductPhoto())->getPhoto($id);
       $spec = (new ProductSpec())->getSpec($id);
       $shop = (new ProductShop())->getShop($id);
       $content = (new ProductContent())->getContent($id);

       return view("front.product.detail",compact("type_layer1","product","photo","spec","shop","content"));
    }

    public function getProduct(Request $req)
    {
        $id= $req->id;

        $product = Product::find($id);
        return response()->json($product);
    }

    public function getPhoto(Request $req)
    {
        $id= $req->product_id;

        $photo = (new ProductPhoto())->getPhoto($id);
        return response()->json($photo);
    }

    public function getSpec(Request $req)
    {
        $id= $req->product_id;

        $spec = (new ProductSpec())->getSpec($id);
        return response()->json($spec);
    }

    public function getShop(Request $req)
    {
        $id= $req->product_id;

        $shop = (new ProductShop())->getShop($id);
        return response()->json($shop);
    }

    public function getContent(Request $req)
    {
        $id= $req->product_id;

        $content= (new ProductContent())->getContent($id);
        return response()->json($content);
    }
}
