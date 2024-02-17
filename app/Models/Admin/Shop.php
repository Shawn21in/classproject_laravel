<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "shop";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "shopName"
    ];
}
