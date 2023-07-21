<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/pagar', function () {
    return view('web.checkout');
});

Route::get('/nosotros', function () {
    return view('web.aboutUs');
});

Route::get('/blog-detalles', function () {
    return view('web.blogDetails');
});


Route::get('/blog', function () {
    return view('web.blog');
});

Route::get('/carrito', function () {
    return view('web.cart');
});

Route::get('/contactanos', function () {
    return view('web.contactUs');
});

Route::get('/registro', function () {
    return view('web.loginRegister');
});

Route::get('/micuenta', function () {
    return view('web.myAccount');
});

Route::get('/detalles', function () {
    return view('web.productsDetails');
});

Route::get('/productos', function () {
    return view('web.shopGrid');
});

Route::get('/', function () {
    return view('welcome');
    //return redirect()->route('login');
});


Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');

Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::resource('business', 'BusinessController')->names('business')->only([
    'index', 'update'
]);
Route::resource('printers', 'PrinterController')->names('printers')->only([
    'index', 'update'
]);

Route::resource('users', 'UserController')->names('users');

Route::resource('roles', 'RoleController')->names('roles');

Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('products', 'ProductController')->names('products');

Route::post('upload/product/{id}/image', 'ProductController@upload_image')->name('upload.product.image');

Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('purchases', 'PurchaseController')->names('purchases')->except([
    'edit', 'update'
]);
Route::resource('sales', 'SaleController')->names('sales')->except([
    'edit', 'update'
]);

Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');

Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');

Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');

Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/buscar', 'SearchController@buscar')->name('buscar');
