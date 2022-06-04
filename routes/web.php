<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Brand\MultiImageController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\HomeAboutController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\User\UserController;
use App\Models\Multipic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $About = DB::table('home_abouts')->first();
    $images= Multipic::all();
    return view('home', compact('brands','About','images'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        return view('dashboard');
    })->name('dashboard');



    //Category
    Route::group(['Category' => 'Sections'], function () {
        Route::get('/Category', [CategoryController::class, 'index'])->name('Category');
        Route::get('/edit_Category/{id}', [CategoryController::class, 'edit']);
        Route::post('/store_Category', [CategoryController::class, 'store'])->name('store_Category');
        Route::post('/update_Category/{id}', [CategoryController::class, 'update']);
        Route::get('/delete_Category/{id}', [CategoryController::class, 'destroy']);
        Route::get('/Restore_Category/{id}', [CategoryController::class, 'Restore']);
        Route::get('/FDelete_Category/{id}', [CategoryController::class, 'FDelete']);
    });


    ///////// End Category ////////

    ///// Brand///////////
    Route::group(['Brand' => 'Sections'], function () {
        Route::get('/Brand', [BrandController::class, 'index'])->name('Brand');
        Route::post('/store_Brand', [BrandController::class, 'store'])->name('store_Brand');
        Route::get('/edit_Brand/{id}', [BrandController::class, 'edit']);
        Route::post('/update_Brand/{id}', [BrandController::class, 'update']);
        Route::get('/delete_Brand/{id}', [BrandController::class, 'destroy']);
    });

    ///// End Brand//////




    ///// Multi///////////
    Route::group(['Brand' => 'Sections'], function () {
        Route::get('/Multi', [MultiImageController::class, 'index'])->name('Multi');
        Route::post('/store_Multi', [MultiImageController::class, 'store'])->name('store_Multi');
        // Route::get('/edit_Brand/{id}', [BrandController::class, 'edit']);
        // Route::post('/update_Brand/{id}', [BrandController::class, 'update']);
        // Route::get('/delete_Brand/{id}', [BrandController::class, 'destroy']);
    });

    ///// End Multi//////

    ///// User///////////
    Route::group(['User' => 'Sections'], function () {
        Route::get('/User', [UserController::class, 'index'])->name('User');
        Route::get('/User', [UserController::class, 'index'])->name('User');
        Route::post('/user_store', [UserController::class, 'store'])->name('store_Brand');
        Route::get('/user_edit/{id}', [UserController::class, 'edit']);
        Route::post('/user_update/{id}', [UserController::class, 'update']);
        Route::get('/user_delete/{id}', [UserController::class, 'destroy']);
        Route::get('profile/{id}', [UserController::class, 'profile'])->name('profile');
    });

    ///// End User//////


    ///// Home///////////
    Route::group(['Home' => 'Sections'], function () {
        //Route Slider
        Route::get('/Slider', [HomeController::class, 'SliderAil'])->name('Slider');
        Route::post('/Slider_store', [HomeController::class, 'Slider_Store'])->name('Slider_store');
        Route::get('/Slider_edit/{id}', [HomeController::class, 'Slider_Edit']);
        Route::post('/Slider_update/{id}', [HomeController::class, 'Slider_Update']);
        Route::get('/Slider_delete/{id}', [HomeController::class, 'Slider_Destroy']);
        ///////End Route Slider///////////


  //Route portfolio
        Route::get('/portfolio', [HomeController::class, 'Portfolioall'])->name('portfolio');
    ///////End Route portfolio///////////


     //Route admin contact
     Route::get('/contact', [ContactController::class, 'index'])->name('contact');
     Route::post('/contact_store', [ContactController::class, 'store'])->name('Slider_store');
     Route::get('/contact_edit/{id}', [ContactController::class, 'edit']);
     Route::post('/contact_update/{id}', [ContactController::class, 'update']);
     Route::get('/contact_delete/{id}', [ContactController::class, 'destroy']);

     //Route page contact
     Route::get('/contact_page', [ContactController::class, 'contact_page'])->name('contact_page');
     Route::get('/message', [ContactController::class, 'message'])->name('message');
     Route::post('/contact_forms', [ContactController::class, 'contact_forms'])->name('contact_forms');
     ///////End Route contact///////////

   //Route About
   Route::get('/About', [HomeAboutController::class, 'index'])->name('About');
   Route::post('/About_store', [HomeAboutController::class, 'store'])->name('About_store');
   Route::get('/About_edit/{id}', [HomeAboutController::class, 'edit']);
   Route::post('/About_update/{id}', [HomeAboutController::class, 'update']);
   Route::get('/About_delete/{id}', [HomeAboutController::class, 'destroy']);
   ///////End Route About///////////


    });

    ///// End Home//////
});
