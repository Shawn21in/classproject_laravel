<?php

use App\Http\Controllers\Front\ProductController as FrontProductController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "info","prefix" => "product"],function(){
    Route::get("detail/{type_layer1}/{id}", [FrontProductController::class, "detail"]);
    Route::get("list/{type_layer1}", [FrontProductController::class, "list"]);

});

?>