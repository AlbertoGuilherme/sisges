<?php

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
Route::get('notifications/get', 'NotificationsController@getNotificationsData')
    ->name('notifications.get');
/**
 * Aterando os dados do utilizador
 */
Route::get('admin/alter','UserController@alter');
Route::get('generate-pdf','PDFController@generatePDF');

Route::get('pdf', function () {
    return view('myPDF');
});

Route::get('/','Admin\MainController@site')->name('site');
Route::get('/profile/{id}','Admin\MainController@proUser')->name('proUser');

             /**
             * Route User
             */

            Route::any('admin/users/search', 'UserController@search')->name('users.search');
            Route::resource('admin/users', 'UserController');

            /**
             * Cart
             */

             Route::namespace('admin')
                        ->middleware('auth')
                       ->group(function(){
                            Route::get('/buy', 'CartController@index')->name('buy.index');
                            Route::get('cart', 'CartController@cart')->name('cart');
                            Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('add.to.cart');
                            Route::patch('update-cart', 'CartController@update')->name('update.cart');
                            Route::delete('remove-from-cart', 'CartController@remove')->name('remove.from.cart');
                        });



Route::prefix('admin')
        ->namespace('admin')->middleware('auth')
        ->group(function(){

            Route::get('test-acl', function(){
                    dd(auth()->user()->isAdmin());
            });


               /**
              * complain
              */
              Route::any('complains/search', 'ComplainController@search')->name('complains.search');
              Route::resource('complains', 'ComplainController');
              Route::put('complains/alter/{id}', 'ComplainController@alter')->name('complains.alter');




            /**
             * PRODUCTS X ORDERS
             */
            Route::post('products/{id}/orders', 'ProductOrderController@attachProductOrder')->name('products.orders.attach');
            Route::any('products/{id}/orders/create', 'ProductOrderController@ordersAvalaible')->name('products.orders.avalaible');
            Route::get('products/{id}/orders', 'ProductOrderController@orders')->name('products.orders');
            Route::get('products/{id}/orders/{idPermission}', 'ProductOrderController@detachProductOrder')->name('products.orders.detach');
            Route::get('orders/{id}/products', 'ProductOrderController@products')->name('orders.products');

     /**
              * ORDER PRODUCTS
              */
              Route::any('products/search', 'ProductController@search')->name('products.search');
              Route::resource('products', 'ProductController');

                /**
              * ORDER ROUTE
              */
              Route::get('orders/states', 'OrderController@states')->name('orders.states');
              Route::any('orders/search', 'OrderController@search')->name('orders.search');
              Route::resource('orders', 'OrderController');
              Route::put('orders/alter/{id}', 'OrderController@alter')->name('orders.alter');
              //


         /**
          * Main ROUTE
          */
                 Route::get('index','MainController@index')->name('admin.main');


                /**
                 * PermissionXProfile
                 */

                Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionProfile')->name('profiles.permissions.attach');
                Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvalaible')->name('profiles.permissions.avalaible');
                Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
                Route::get('profiles/{id}/permissions/{idPermission}', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permissions.detach');
                Route::get('permissions/{id}/profiles', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

            /**
             * Route Profile
             */

                Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
                Route::resource('profiles', 'ACL\ProfileController');

                /*
                 Route Permission
                */
               Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
               Route::resource('permissions', 'ACL\PermissionController');


        });



Auth::routes();

