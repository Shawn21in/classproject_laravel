<?php

use App\Http\Controllers\Admin\Product\ShopController as ProductShopController;

use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "manager","prefix" => "admin/productShop"],function(){
    
    Route::get("add/{product_id}",[ProductShopController::class, "add"]);
    Route::post("insert",[ProductShopController::class, "insert"]);
    Route::get("edit/{product_id}/{id}",[ProductShopController::class, "edit"]);
    Route::post("update",[ProductShopController::class, "update"]);
    Route::post("delete",[ProductShopController::class, "delete"]);
 

});

?>