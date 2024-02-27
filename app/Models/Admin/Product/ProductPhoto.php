<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "product_photo";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "product_id",
        "photo"
    ];

    public function getPhoto($product_id){
        $list = self::where("product_id",$product_id)->get();

        return $list;
    }

    public function deletePhoto($product_id){
        self::where("product_id",$product_id)->delete();
    }
}
