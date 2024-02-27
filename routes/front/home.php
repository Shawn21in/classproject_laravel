<?php

use App\Http\Controllers\Front\HomeContoller;
use Illuminate\Support\Facades\Route;

Route::get("/",[HomeContoller::class, "index"]);


?>