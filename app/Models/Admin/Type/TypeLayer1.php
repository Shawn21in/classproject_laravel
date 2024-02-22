<?php

namespace App\Models\Admin\Type;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeLayer1 extends Model
{
    public $timestamps = false;
    protected $table = "type_layer1";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "type_layer1_name"
    ];
    
    public function search($keyword){
        $list = self::where("type_layer1_name","LIKE","%".$keyword. "%")->get();
        return $list;
    }

}
