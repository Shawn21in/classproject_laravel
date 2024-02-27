<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use App\Models\Admin\Product\ProductPhoto;
use App\Models\Admin\Product\ProductShop;
use App\Models\Admin\Product\ProductSpec;
use App\Models\Admin\Shop;
use App\Models\Admin\Type\TypeLayer1;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    public function list(){
        $list = (new Product())->getList();

        return view("admin.product.list",compact("list"));
    }

    public function add(){
        $type_layer1 = TypeLayer1::get();
        $shop = Shop::all();
        return view("admin.product.add",compact("type_layer1","shop"));
    }

    public function insert(Request $req){
        DB::beginTransaction();
        try{
            $id = $this->addProduct($req);
            $this->addPhoto($id);
            $this->addSpec($id);
            $this->addProductShop($id);

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            throw $e;
        }

        Session::flash("message","以新增");
        return redirect("/admin/product");
    }

    private function addProduct(Request $req)
    {
        $product = new Product();
        $product->type_layer1 = $req->type_layer1_name;
        $product->title = $req->title;
        $product->sub_title = $req->sub_title;
        $product->content = $req->product_content;
        $product->home = $req->home;
        $product->save();

        return $product->id;
    }

    private function addPhoto($id){
        //取得所有輸入資料
        $input = request()->all();
        //如果public資料夾下沒有images資料夾
        if(!file_exists("images"))
        {
            //在public下建立images資料夾,權限允許讀取執行寫入
            mkdir("images",0777,true);
        }

        if(!file_exists("images/product"))
        {
            //在public下建立images資料夾,權限允許讀取執行寫入
            mkdir("images/product",0777,true);
        }

        foreach(range("1","5")as $cnt)
        {
            if(!empty($input["file" . $cnt])){
                $file = $input["file" . $cnt];
                $times = explode(" ",microtime());
                $fileName = strftime("%Y_%m_%d_%H_%M_%S_",$times[1]).substr($times[0],2,3).".".$file->extension();
                $file->move("images/product",$fileName);

                $photo =new ProductPhoto();
                $photo->product_id=$id;
                $photo->photo=$fileName;
                $photo->save();
            }
        }

    }

    private function addSpec($id){
        $input = request()->all();
        for($i = 1; $i<=10 ; $i++)
        {
            if(!empty($input["title".$i]))
            {
                $spec =new ProductSpec();
                $spec->product_id=$id;
                $spec->title=$input["title".$i];
                $spec->content=$input["content".$i];
                $spec->save();
            }
        }
    }

    private function addProductShop($id){
        $list = Shop::get();
        $input = request()->all();
        foreach($list as $data)
        {
            if(!empty($input["shop".$data->id])){
                $shop = new ProductShop();
                $shop->product_id = $id;
                $shop->shop_id = $data->id;
                $shop->url = $input["url".$data->id];
                $shop->save();
            }
        }
    }

    public function edit(Request $req){
        $product = Product::find($req->id);
        $shop = (new ProductShop())->getShop($req->id);
        $photo = (new ProductPhoto())->getPhoto($req->id);
        $spec = (new ProductSpec())->getSpec($req->id);
        $type_layer1 = TypeLayer1::get();
        $shopList = shop::all();

        return view("admin.product.edit",compact("product","shop","photo","spec","type_layer1","shopList"));

    }

    public function update(Request $req){
        $product = Product::find($req->id);
        $temp=$product->title;
        $product->type_layer1 = $req->type_layer1;
        $product->title = $req->title;
        $product->sub_title = $req->sub_title;
        $product->content = $req->product_content;
        $product->home = $req->home;
        $product->save();

        Session::flash("message", $temp."已修改為".($req->title));
        return redirect("/admin/product");
    }

    public function delete(Request $req){
        if(!empty($req->id))
        {
            foreach($req->id as $id){
                DB::beginTransaction();
                try{
                    //從產品圖列表
                    $photoList = (new ProductPhoto())->getPhoto($id);
                    //如果產品圖不是空的,且資料筆數>0
                    if(!empty($photoList) && sizeof($photoList) >0){
                        foreach($photoList as $photo){
                            // 從檔案刪除產品圖
                            /*
                            以後做專案,要詢問業主或窗口
                            當刪除產品時,圖檔是否一併刪除
                            一旦刪除無法復原,要再三確認
                            */ 
                            @unlink("images/product/".$photo->photo);
                        }
                        //刪除產品圖
                        (new ProductPhoto())->deletePhoto($id);
                    }
                    (new ProductSpec())->deleteSpec($id);
                    (new ProductShop())->deleteShop($id);
                    Product::destroy($id);
                    DB::commit();
                }catch(Exception $e){
                    DB::rollBack();
                    throw $e;
                }
            }

            Session::flash("message","產品已刪除");
            return redirect("/admin/product");
        }else{
            Session::flash("message","請選擇要刪除的產品");
            return redirect()->back();
        }
    }
}
