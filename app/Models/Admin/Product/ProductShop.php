<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductShop extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "product_shop";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "product_id",
        "shop_id",
        "url"
    ];

    public function getShop($product_id){
        $list = DB::table("product_shop AS a")
            ->selectRaw("a.*,b.shopName")
            ->join("shop AS b", "a.shop_id", "b.id")
            ->where("a.product_id",$product_id)
            ->get();

        return $list;

    }

    public function getshopname($shopid){
        $list = DB::table("product_shop AS a")
            ->selectRaw("b.shopName")
            ->join("shop AS b", "a.shop_id", "b.id")
            ->where("b.id",$shopid)
            
            ->first();

        return $list;
    }

    public function getAddShop($product_id)
    {
        $list = DB::table("shop")
        ->selectRaw("*")
        ->whereNotIn("id",
        DB::table("product_shop")->selectRaw("shop_id")->where("product_id",$product_id))->get();
    //SELECT * FROM shop WHERE id NOT IN(SELECT shop_id FROM product WHERE producr_id = $product_id)
    //另一種方式
    /*
    $list = DB::select("SELECT * FROM shop WHERE id NOT IN(SELECT shop_id FROM product WHERE product_id=?),[$product_ID]");
    */ 

    return $list;
    }

    public function deleteShop($product_id){
        self::where("product_id",$product_id)->delete();
    }
}
