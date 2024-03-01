<?php

namespace App\Models\Admin\Product;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// use DB;也可以,這是用別名

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "product";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "type_layer1",
        "title",
        "sub_title",
        "content",
        "home"
    ];

    public function getList(){
        $list =  DB::table("product as a")
            ->selectRaw("a.*, b.type_layer1_name")
            ->join("type_layer1 as b", "a.type_layer1","b.id")
            ->orderby("a.type_layer1","ASC")
            ->paginate(10);//paginate:分頁,每頁幾筆可自訂

        return $list;    
    }

    public function getHomeProduct(){
        $list = DB::select("SELECT id,type_layer1,title,sub_title,content,
        (SELECT photo From product_photo WHERE product_id = a.id ORDER BY RAND() LIMIT 1) AS photo
        FROM product a 
        WHERE home ='Y'");

        return $list;
    }

    public function getType_layer1Product($type_layer1){
        $list = DB::select("SELECT id,type_layer1,title,sub_title,content,
        (SELECT photo From product_photo WHERE product_id = a.id ORDER BY RAND() LIMIT 1) AS photo
        FROM product a 
        WHERE type_layer1 = ?",[$type_layer1]);

        return $list;
    }
}
