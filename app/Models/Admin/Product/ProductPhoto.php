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
}
