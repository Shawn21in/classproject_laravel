<?php

namespace App\Models\Admin\Product;


use Illuminate\Database\Eloquent\Model;

class ProductSpec extends Model
{
    public $timestamps = false;
    protected $table = "product_spec";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "title",
        "product_id",
        "content"
    ];
}
