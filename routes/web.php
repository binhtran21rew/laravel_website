<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Models\Role;

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
Route::get("/", 'App\Http\Controllers\AdminController@loginAdmin')->name('login');
Route::post("/", 'App\Http\Controllers\AdminController@isAdmin');
Route::get("/logout", 'App\Http\Controllers\AdminController@logout')->name('logout');
Route::get('/register','App\Http\Controllers\AdminController@register')->name('register');
Route::post('/store',[
    'as' => 'store',
    'uses' => 'App\Http\Controllers\AdminController@store'
]);
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/home', function () {
        return view('home');
    });
});



Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index',
            'middleware' => 'can:category-list'
        ]);
    
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'App\Http\Controllers\CategoryController@create',
            'middleware' => 'can:category-add'

        ]);
        Route::post('/store',[
            'as' => 'categories.store',
            'uses' => 'App\Http\Controllers\CategoryController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit',
            'middleware' => 'can:category-edit'

        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'App\Http\Controllers\CategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete',
            'middleware' => 'can:category-delete'
        ]);
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'App\Http\Controllers\MenuController@index',
            'middleware' => 'can:menu-list'
        ]);
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'App\Http\Controllers\MenuController@create',
            'middleware' => 'can:menu-add'
        ]);
        Route::post('/store',[
            'as' => 'menus.store',
            'uses' => 'App\Http\Controllers\MenuController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'App\Http\Controllers\MenuController@edit',
            'middleware' => 'can:menu-edit'

        ]);
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'App\Http\Controllers\MenuController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'App\Http\Controllers\MenuController@delete',
            'middleware' => 'can:menu-delete'

        ]);
    });
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'App\Http\Controllers\ProductController@index',
            'middleware' => 'can:product-list'

        ]);
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'App\Http\Controllers\ProductController@create',
            'middleware' => 'can:product-add'

        ]);
        Route::post('/store',[
            'as' => 'product.store',
            'uses' => 'App\Http\Controllers\ProductController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'App\Http\Controllers\ProductController@edit',
            'middleware' => 'can:product-edit'

        ]);
        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'App\Http\Controllers\ProductController@update',
            'middleware' => 'can:product-delete'

        ]);
        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'App\Http\Controllers\ProductController@delete'
        ]);
    });


    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'App\Http\Controllers\SliderController@index',
            'middleware' => 'can:slider-list'

        ]);
        
        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'App\Http\Controllers\SliderController@create',
            'middleware' => 'can:slider-add'

        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'App\Http\Controllers\SliderController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'App\Http\Controllers\SliderController@edit',
            'middleware' => 'can:slider-edit'

        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'App\Http\Controllers\SliderController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'App\Http\Controllers\SliderController@delete',
            'middleware' => 'can:slider-delete'

        ]);
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'App\Http\Controllers\UserController@index',
            'middleware' => 'can:account-list'

        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'App\Http\Controllers\UserController@create',
            'middleware' => 'can:account-add'

        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'App\Http\Controllers\UserController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'App\Http\Controllers\UserController@edit',
            'middleware' => 'can:account-edit'

        ]);
        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'App\Http\Controllers\UserController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'App\Http\Controllers\UserController@delete',
            'middleware' => 'can:account-delete'
            
        ]);
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'App\Http\Controllers\RoleController@index',
            // 'middleware' => 'can:role-list'

        ]);
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'App\Http\Controllers\RoleController@create',
            'middleware' => 'can:role-add'

        ]);
        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'App\Http\Controllers\RoleController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'App\Http\Controllers\RoleController@edit',
            // 'middleware' => 'can:role-edit'
            
        ]);
        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'App\Http\Controllers\RoleController@update',
            
        ]);
        // Route::get('/delete/{id}', [
        //     'as' => 'users.delete',
        //     'uses' => 'App\Http\Controllers\UserController@delete'
        // ]);
    });

    Route::prefix('permission')->group(function () {
        Route::get('/create', [
            'as' => 'permission.create',
            'uses' => 'App\Http\Controllers\PermissionController@createPermission',
        ]);
        Route::post('/store', [
            'as' => 'permission.store',
            'uses' => 'App\Http\Controllers\PermissionController@storePermission',
        ]);
    });
    Route::prefix('bill')->group(function () {
        Route::get('/', [
            'as' => 'bill.index',
            'uses' => 'App\Http\Controllers\BillController@index',
            // 'middleware' => 'can:role-list'

        ]);
        Route::get('/order/{id}', [
            'as' => 'bill.order',
            'uses' => 'App\Http\Controllers\BillController@viewOrder',
            // 'middleware' => 'can:role-list'

        ]);
    });
});


Route::prefix('store')->group(function () {
    Route::get('/', 'App\Http\Controllers\store\storeController@index')->name('storeHome');
    Route::get('/category/{slug}/{id}',[
        'as' => 'category.product',
        'uses' => 'App\Http\Controllers\store\categoryController@index'
    ]);
    Route::get('/shop',[
        'as' => 'category.shop',
        'uses' => 'App\Http\Controllers\store\categoryController@showShop'
    ]);
    Route::get('/detail',[
        'as' => 'category.detail',
        'uses' => 'App\Http\Controllers\store\categoryController@showDetail'
    ]);
    Route::get('/search',[
        'as' => 'category.search',
        'uses' => 'App\Http\Controllers\store\categoryController@showSearch'
    ]);
    Route::get('/shoppingCart', [
        'as' => 'shopping.cart',
        'uses' => 'App\Http\Controllers\store\shoppingCartController@index'
    ]);
    Route::get('/shoppingCart/cart/{id}', [
        'as' => 'shopping.addCart',
        'uses' => 'App\Http\Controllers\store\shoppingCartController@addCart'
    ]);
    Route::get('/shoppingCart/update', [
        'as' => 'shopping.updateCart',
        'uses' => 'App\Http\Controllers\store\shoppingCartController@updateCart'
    ]);
    Route::get('/shoppingCart/delete', [
        'as' => 'shopping.deleteCart',
        'uses' => 'App\Http\Controllers\store\shoppingCartController@deleteCart'
    ]);
    Route::get('/shoppingCart/checkout', [
        'as' => 'shopping.checkoutCart',
        'uses' => 'App\Http\Controllers\store\shoppingCartController@checkoutCart'
    ]);
    Route::post('/shoppingCart/store',[
        'as' => 'shopping.store',
        'uses' => 'App\Http\Controllers\store\shoppingCartController@store'
    ]);
});




