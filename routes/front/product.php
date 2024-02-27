<?php

use App\Http\Controllers\Front\ProductController as FrontProductController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "product"],function(){
    Route::get("detail/{type_layer1}/{id}", [FrontProductController::class, "detail"]);
    Route::get("detail/{type_layer1}", [FrontProductController::class, "list"]);

});

?>