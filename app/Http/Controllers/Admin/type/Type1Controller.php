<?php

namespace App\Http\Controllers\Admin\type;

use App\Http\Controllers\Controller;
use App\Models\Admin\Type\TypeLayer1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Type1Controller extends Controller
{
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
        return redirect("admin/type1");
    }

    public function edit(Request $req){
        $type_layer1 = TypeLayer1::find($req->id);
        return view("admin.type1.edit", compact("type_layer1"));
    }

    public function update(Request $req){
        $type_layer1 = TypeLayer1::find($req->id);
        $type_layer1->type_layer1_name = $req->type_layer1_name;
        $type_layer1->save();

        Session::flash("message","已修改");
        return redirect("admin/type1");
    }

}
