<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//============================== rutas del cliente ========================// 

Route::get('pagar', 'WebController@checkout')->name('web.checkout');
Route::get('nosotros', 'WebController@aboutUs')->name('web.aboutUs');
Route::get('blog-detalles', 'WebController@blogDetails')->name('web.blogDetails');
Route::get('blog', 'WebController@blog')->name('web.blog');
Route::get('carrito', 'WebController@cart')->name('web.cart');
Route::get('contactanos', 'WebController@contactUs')->name('web.contactUs');
Route::get('registro', 'WebController@loginRegister')->name('web.loginRegister');
Route::get('micuenta', 'WebController@myAccount')->name('web.myAccount');
Route::get('detalles', 'WebController@productsDetails')->name('web.productsDetails');
Route::get('productos', 'WebController@shopGrid')->name('web.shopGrid');
Route::get('/', 'WebController@welcome')->name('web.welcome');

//============================== fin =====================================//
Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');

Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::resource('business', 'BusinessController')->names('business')->only([
    'index',
    'update'
]);
Route::resource('printers', 'PrinterController')->names('printers')->only([
    'index',
    'update'
]);

Route::resource('users', 'UserController')->names('users');

Route::resource('roles', 'RoleController')->names('roles');

Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('products', 'ProductController')->names('products');

Route::post('upload/product/{id}/image', 'ProductController@upload_image')->name('upload.product.image');

Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('purchases', 'PurchaseController')->names('purchases')->except([
    'edit',
    'update'
]);
Route::resource('sales', 'SaleController')->names('sales')->except([
    'edit',
    'update'
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
Route::get('get_subcategories', 'AjaxController@get_subcategories')->name('get_subcategories');
Route::get('get_products_by_subcategory', 'AjaxController@get_products_by_subcategory')->name('get_products_by_subcategory');

//subcategorias

Route::resource('subcategories', 'SubcategoryController')
    ->except(['edit', 'update', 'show'])
    ->names('subcategories');
Route::put('category/{category}/subcategory/{subcategory}/update', 'SubcategoryController@update')->name('subcategories.update');

Route::get('category/{category}/subcategory/{subcategory}', 'SubcategoryController@edit')->name('subcategories.edit');

Route::resource('tags', 'TagController')
->except(['show'])
->names('tags');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/buscar', 'SearchController@buscar')->name('buscar');
