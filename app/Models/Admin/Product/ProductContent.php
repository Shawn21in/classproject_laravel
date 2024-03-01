<?php

namespace App\Models\Admin\Product;


use Illuminate\Database\Eloquent\Model;

class ProductContent extends Model
{
    public $timestamps = false;
    protected $table = "product_content";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "product_id",
        "content"
    ];

    public function getContent($product_id){
        $content= self::where("product_id",$product_id)->first();
        return $content;
    }
}
