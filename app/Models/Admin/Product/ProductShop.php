<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
