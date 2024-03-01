<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ap extends Model
{
    public $timestamps = false;
    protected $table = "ap";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "ap_name"
    ];

    
}
