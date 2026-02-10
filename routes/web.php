<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingCartDetailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

//============================== rutas del cliente ========================// 
Route::post('/payments/pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('pagar', 'MyAccountController@checkout')->name('web.checkout');
Route::get('nosotros', 'WebController@aboutUs')->name('web.aboutUs');
Route::get('blog-detalles', 'WebController@blogDetails')->name('web.blogDetails');
Route::get('blog', 'WebController@blog')->name('web.blog');
Route::get('mis_compras', 'WebController@cart')->name('web.cart');
Route::get('contactanos', 'WebController@contactUs')->name('web.contactUs');
Route::get('registro', 'WebController@loginRegister')->name('web.loginRegister');
Route::get('mi_cuenta', 'MyAccountController@myAccount')->name('web.myAccount');
Route::get('producto/{product}', 'WebController@productsDetails')->name('web.productsDetails');
Route::get('productos', 'WebController@shopGrid')->name('web.shopGrid');
Route::get('/', 'WebController@welcome')->name('web.welcome');
Route::get('mis_ordenes/pedido/{order}', [MyAccountController::class, 'order_details'])->name('web.order_details');


Route::resource('shopping_cart_detail', 'ShoppingCartDetailController')->only([
     'update'
    ])->names('shopping_cart_details');
    
    Route::post('add_to_shopping_cart/{product}/store', [ShoppingCartDetailController::class, 'store'])->name('shopping_cart_details.store');
    Route::get('add_a_product_to_the_shopping_cart/{product}/store', [ShoppingCartDetailController::class, 'store_a_product'])->name('store_a_product');
    route::get('shopping_cart_detail/{shopping_cart_detail}/destroy', [ShoppingCartDetailController::class, 'destroy'])->name('shopping_cart_details.destroy');

    Route::post('shopping_cart/update', 'ShoppingCartController@update')->name('shopping_cart.update');

    Route::get('mis_ordenes', 'MyAccountController@orders')->name('web.orders');
    Route::get('detalles_de_la_cuenta', [MyAccountController::class, 'account_info'])->name('web.account_info');
    Route::put('update_client/{user}/update', [UserController::class, 'update_client'])->name('web.update_client');
    Route::get('editar_direccion', [MyAccountController::class, 'address_edit'])->name('web.address_edit');
    Route::get('cambiar_contrasena', [MyAccountController::class, 'change_password'])->name('web.change_password');
    Route::put('update_profile/{profile}/update', [ProfileController::class, 'update'])->name('update_profile');

    Route::put('update_client/{user}/update', [UserController::class, 'update_client'])->name('web.update_client');
    Route::post('/profile/image', [ProfileController::class, 'updateProfileImage'])->name('update_profile_image');
    Route::put('update_password/{user}/update', [UserController::class, 'update_password'])->name('web.update_password');    

//============================== fin =====================================//

Route::put('orders_update/{id}', [OrderController::class, 'orders_update'])->name('orders_update');

Route::resource('orders', 'OrderController')->names('orders')->only([
    'index',
    'show'
]);

Route::get('/payments/approval', [PaymentController::class, 'approval'])->name('approval');
Route::get('/payments/cancelled', [PaymentController::class, 'cancelled'])->name('cancelled');

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

Route::resource('posts', 'PostController')->names('posts');

Route::resource('roles', 'RoleController')->names('roles')->except([
    'create',
    'store',
    'destroy'
]);

Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('products', 'ProductController')->names('products');

Route::post('upload/product/{id}/image', 'ProductController@upload_image')->name('upload.product.image');
Route::post('upload_image/{id}', [AjaxController::class, 'upload_image'])->name('upload.image');

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
    return view('pruebas');
});

Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');

Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');
Route::get('get_subcategories', 'AjaxController@get_subcategories')->name('get_subcategories');
Route::get('get_products_by_subcategory', 'AjaxController@get_products_by_subcategory')->name('get_products_by_subcategory');


Route::resource('tags', 'TagController')
->except(['show'])
->names('tags');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/buscar', 'SearchController@buscar')->name('buscar');


Route::get('/sync_woocommerce/{productId}', [ProductController::class, 'syncWithWooCommerce'])->name('sync_woocommerce');

Route::get('/sync_woocommerce', [ProductController::class, 'syncAllProducts'])->name('sync_all_woocommerce');
