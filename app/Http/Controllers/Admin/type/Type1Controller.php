<?php

namespace App\Http\Controllers\Admin\type;

use App\Http\Controllers\Controller;
use App\Models\Admin\Type\TypeLayer1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Type1Controller extends Controller
{
    public function getType_layer1(Request $req){
        $list = TypeLayer1::find($req->id);
        return response()->json($list);
    }

    public function list(){
        $list = TypeLayer1::get();
        return view("admin.type1.list",compact("list"));
    }

    public function add(){
        return view("admin.type1.add");
    }

    public function insert(Request $req){
        $type_layer1 = new TypeLayer1();
        $type_layer1->type_layer1_name = $req->type_layer1_name;
        $type_layer1->save();

        Session::flash("message","已新增");
        Session::forget("info");// 清除前台使用者存放於middleware的資料
        return redirect("admin/type1");
    }

    public function edit(Request $req){
        $type_layer1 = TypeLayer1::find($req->id);
        return view("admin.type1.edit", compact("type_layer1"));
    }

    public function update(Request $req){
        $type_layer1 = TypeLayer1::find($req->id);
        

        Session::flash("message",($req->type_layer1_name)."已修改");
        $type_layer1->type_layer1_name = $req->type_layer1_name;
        $type_layer1->save();
        Session::forget("info");// 清除前台使用者存放於middleware的資料
        return redirect("admin/type1");
    }

    public function delete(Request $req){
        $temp="";
        
        foreach($req->id as $id){
            $type_layer1 = TypeLayer1::find($id);
            
            $temp = $temp . $type_layer1->type_layer1_name.",";
        }
        TypeLayer1::destroy($req->id);
        Session::flash("message",$temp."已刪除");
        Session::forget("info");// 清除前台使用者存放於middleware的資料
        return redirect("/admin/type1");
    }

    public function search(Request $req){
        $list = (new TypeLayer1())->search($req->keyword);

        return view("admin.type1.search",compact("list"));
    }
}
