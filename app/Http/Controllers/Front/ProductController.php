<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use App\Models\Admin\Product\ProductPhoto;
use App\Models\Admin\Product\ProductShop;
use App\Models\Admin\Product\ProductSpec;
use App\Models\Admin\Type\TypeLayer1;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail(Request $req)
    {
       $type_layer1 = TypeLayer1::find($req->type_layer1);
       $id = $req->id;
       
       $product = Product::find($id);
       $photo = (new ProductPhoto())->getPhoto($id);
       $spec = (new ProductSpec())->getSpec($id);
       $shop = (new ProductShop())->getShop($id);

       return view("front.product.detail",compact("type_layer1","product","photo","spec","shop"));
    }
}
