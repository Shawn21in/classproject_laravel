<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    public $timestamps = false;
    protected $table = "banner";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "apid",
        "photo"
    ];

    public function getList(){
        $list = DB::table("banner as a")
        ->selectRaw("a.*,b.ap_name")
        ->leftjoin("ap as b","a.apid","b.id")
        ->get();

        return $list;
    }

    public function getBanner($apid){
        $list = self::where("apid",$apid)->first();
        return $list;
    }
}
