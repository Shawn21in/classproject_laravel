<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product\ProductSpec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpecController extends Controller
{   
    public function add(Request $req)
    {
        $product_id = $req->product_id;
        return view("admin.spec.add", compact("product_id"));
    }

    public function insert(Request $req)
    {
        $product_id = $req->product_id;
        $spec = new ProductSpec();
        $spec->product_id = $product_id;
        $spec->title = $req->title;
        $spec->content = $req->content;
        $spec->save();

        Session::flash("message", "規格已新增");
        return redirect("/admin/product/edit/" . $product_id . "#tabs-3");
    }

    public function edit(Request $req){
        $product_id = $req->product_id;
        $id = $req->id;

        $spec = ProductSpec::find($id);

        return view("admin.spec.edit",compact("product_id","id","spec"));
    }

    public function update(Request $req){
        $product_id =$req->product_id;
        $id = $req->id;

        $spec = ProductSpec::find($id);
        $temp=$spec->title;
        $spec->title =$req->title;
        $spec->content =$req->content;
        $spec->save();

        Session::flash("message", $temp."規格已修改為".($req->title));
        return redirect("/admin/product/edit/" . $product_id . "#tabs-3");
    }

    public function delete(Request $req){
        $product_id ="";
        if(!empty($req->spec_id))
        {
            foreach($req->spec_id as $id){
                $spec = ProductSpec::find($id);
                $product_id = $spec->product_id;
                $spec->delete();
            }

            Session::flash("message", "規格已刪除");
        return redirect("/admin/product/edit/".$product_id."#tabs-3");
    }else{
        }

        
        Session::flash("message", "請選擇要刪除的規格");
            return redirect()->back();
    }
}
