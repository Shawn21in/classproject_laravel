<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PhotoController extends Controller
{
    public function add(Request $req)
    {
        $product_id = $req->product_id;
        return view("admin.photo.add", compact("product_id"));
    }

    public function insert(Request $req)
    {
        $photo = $req->photo;
        $times = explode(" ", microtime());
        $photoName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]) . substr($times[0], 2, 3) . "." . $photo->extension();
        $photo->move("images/product", $photoName);

        $fs = new ProductPhoto();
        $fs->product_id = $req->product_id;
        $fs->photo = $photoName;
        $fs->save();

        Session::flash("message", "圖檔以新增");
        return redirect("/admin/product/edit/" . $req->product_id . "#tabs-2");
    }

    public function delete(Request $req)
    {
        if (!empty($req->photo_id)) {
            foreach ($req->photo_id as $data) {
                $photo = ProductPhoto::find($data);
                $product_id = $photo->product_id;
                @unlink("images/product/" . $photo->photo);
                $photo->delete();
            }

            Session::flash("message", "圖檔以刪除");
            return redirect("/admin/product/edit/" . $product_id . "#tabs-2");
        } else {
            Session::flash("message", "請選擇要刪除的圖檔");
            return redirect()->back();
        }
    }
}
