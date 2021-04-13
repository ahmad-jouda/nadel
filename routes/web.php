<?php

use App\Http\Middleware\UserType;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::get('/dashboard', function () {
            return view('admin/dashboard');
        })->name('dashboard')->middleware(['auth', 'user.type:admin,super-admin']);

});


// Route::get('/cart', 'CartController@index')->name('cart');
// Route::post('/cart', 'CartController@store')->name('cart.store');
// Route::delete('/cart', 'CartController@destroy')->name('cart.destroy');
// Route::patch('/cart', 'CartController@update')->name('cart.update');

// Route::patch('/checkout', 'CheckoutController@store')->name('checkout');
// Route::get('/orders', 'OrdersController@store')->name('orders');
// Route::get('/orders/{order}', 'OrdersController@show')->name('orders.show');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::group([
            'prefix' => 'admin',
            'namespace' =>'Admin',
            'as' => 'admin.',
            'middleware' => ['auth', 'user.type:admin,super-admin'],
        ],function(){
                Route::resource('/maincategories','MainCategoriesController');
                Route::resource('/subcategories','SubCategoriesController');
                Route::resource('/meals','MealsController');
                Route::resource('/teams','TeamsController');
                Route::resource('/jobtitles','JobTitlesController');
                Route::resource('/tables','TablesController');
                Route::resource('/cart','CartController');
                Route::resource('/roles','RolesController');
                
            });
    });

    Route::get('qrcode', function () {
        return QrCode::size(150)
            ->backgroundColor(255, 255, 204)
            ->generate('Ahmad Joda');
    });


/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/
