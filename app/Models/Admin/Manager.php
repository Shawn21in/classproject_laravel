<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    //use HasFactory;關聯用的,但很難用,棄用
    use HasFactory;

    public $timestamps = false;
    protected $table = "manager";
    protected $primaryKey = "manager_Id";
    protected $fillable = [
        "manager_Id",
        "manager_pwd"
    ];
// 一個類別一旦需要使用需要用new()創建一個物件實體,除非他是static靜態下方的::是靜態呼叫
    public function getManager($managerId)
    {
        // $manager = DB::table("manager")->where("managerId", $managerId)->first();
        $manager = self::where("manager_Id", $managerId)->first();

        return $manager;
    }
}
