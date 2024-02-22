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
}
