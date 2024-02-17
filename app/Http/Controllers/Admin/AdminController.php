<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Manager;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view("admin.login");
    }

    public function doLogin(Request $req)
    {   
        //$manager是呼叫getManager並將managerId用($req->managerId)餵進去,所以$manager->manager_pwd(這邊要放資料庫欄位名稱)
        $manager = (new Manager())->getManager($req->managerId);
        if(empty($manager))
        {

            return back()->withInput()->withErrors(["account" => "account has an error"]);
        }else{
            if($manager->manager_pwd != $req->password)
            {
                return back()->withInput()->withErrors(["password" => "password has an error"]);
            }else{
                // 將帳號站存在記憶體中
                // session 可以跨頁存取
                // session 存在server, 而cookie存在使用者電腦
                session()->put("managerId",$req->managerId);
                //  redirect()轉址
                return redirect("/admin/home");
            }
        }

    }

    public function home()
    {
        //echo("home");
        return view("admin.home");
    }
}
