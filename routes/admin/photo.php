<?php

use App\Http\Controllers\Admin\Product\PhotoController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "manager","prefix" => "admin/photo"],function(){
    Route::get("add/{product_id}",[PhotoController::class, "add"]);
    Route::post("insert",[PhotoController::class, "insert"]);
    Route::post("delete",[PhotoController::class, "delete"]);
});

?>