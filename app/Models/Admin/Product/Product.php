<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        "content"
    ];
}
