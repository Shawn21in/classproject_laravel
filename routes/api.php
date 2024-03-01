<?php

use App\Http\Controllers\Admin\type\Type1Controller;
use App\Http\Controllers\Front\HomeContoller;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/getHomeProduct",[HomeContoller::class, "getHomeProduct"]);

Route::group(["prefix" => "product"], function(){
    // http://127.0.0.1:8000/api/product/getProduct/3 檢查用 id要找資料庫有的
    Route::get("getProduct/{id}", [ProductController::class, "getProduct"]);
    Route::get("getPhoto/{product_id}", [ProductController::class, "getPhoto"]);
    Route::get("getSpec/{product_id}", [ProductController::class, "getSpec"]);
    Route::get("getShop/{product_id}", [ProductController::class, "getShop"]);
    Route::get("getContent/{product_id}", [ProductController::class, "getContent"]);
    Route::get("getList/{type_layer1}", [ProductController::class, "getList"]);
});

Route::group(["prefix" => "type_layer1"], function(){
    Route::get("getType_layer1/{id}", [Type1Controller::class, "getType_layer1"]);
    Route::get("getFrontType_layer1", [Type1Controller::class, "getFrontType_layer1"]);
});