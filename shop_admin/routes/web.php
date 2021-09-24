<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::group(['namespace' => 'Frontend'], function()
{
  Route::get('/', 'ShopController@index');

  Route::get('/blog', 'BlogController@index')->name('blog');
  Route::get('/blog/{id}', 'BlogController@show')->name('showBlog');
  Route::post('/blog/ajax_rate', 'BlogController@ajax_rate');

  Route::get('/member/login','LoginController@getLogin')->name('getLogin');
  Route::post('/member/login', 'LoginController@postLogin')->name('postLogin');
  Route::get('/member/logout', 'LoginController@logout')->name('getLogout');

  Route::get('/member/register', 'RegisterController@Create')->name('getRegister');
  Route::post('/member/register', 'RegisterController@Store')->name('postRegister');

  Route::get('/product/{id}', 'ShopController@showProduct')->name(('product.show'));
  Route::get('search', 'ShopController@searchName')->name('search.name');
  Route::get('search/advanced', 'ShopController@search')->name('search.advanced');
  Route::post('search/price', 'ShopController@searchPrice');

  Route::post('/addtocart', 'CartController@addCart');
  Route::get('/cart', 'CartController@index');
  Route::post('/cart/up', 'CartController@upQuantity');
  Route::post('/cart/down', 'CartController@downQuantity');
  Route::post('/cart/delete', 'CartController@delete');
  Route::post('/cart/pay', 'CartController@pay');
  
  Route::get('/cart/order', 'CartController@order');
  Route::post('/cart/checkout', 'CartController@checkout');
});

Route::group([
  'Middleware' => 'CheckMemberLogin',
  'namespace' => 'Member',
  'prefix' => 'member' ], function()
  {
    Route::get('/', 'HomeController@index')->name('home');

    //replay comment
    Route::post('/comment/{id}/{level}', 'CommentController@store_replay')->name('postRepComment');

    Route::post('/comment/{id}', 'CommentController@store')->name('postComment');
    
    Route::get('/{id}', 'MemberController@edit')->name('getProfile');
    Route::post('/{id}', 'MemberController@update')->name('postProfile');

    Route::get('/product/create', 'ProductController@create')->name('product.create');
    Route::post('/product/create', 'ProductController@store')->name('product.store');

    Route::get('{id}/product', 'ProductController@index')->name('getMyProducts');

    Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');
    Route::post('/product/{id}/edit', 'ProductController@update')->name('product.update');

  }
);
Auth::routes();

Route::group([
  'namespace' => 'Admin',
  'prefix' => 'admin' ], function()
  {
    Route::get('/user','DashboardController@index')->name('getAdmin');
  
    // Route::get('user/profile','UserController@index');
    
    Route::get('/user/profile','UserController@edit');

    Route::post('/user/profile','UserController@update');

    Route::post('/user/uploadavatar', 'UserController@update_avatar');

    // Route::resource('country', 'CountryController', ['except' => ['show']]);

    Route::get('/country','CountryController@index');

    Route::get('/country/create','CountryController@create');

    Route::post('/country/create','CountryController@store');

    Route::get('/country/{id}/edit','CountryController@edit');

    Route::post('/country/{id}/edit','CountryController@update');

    Route::get('/country/{id}/delete','CountryController@destroy');

    // Route::resource('user', 'UserController');

    Route::get('/blog','BlogController@index');

    Route::get('/blog/create','BlogController@create');

    Route::post('/blog/create','BlogController@store');

    Route::get('/blog/{id}/edit','BlogController@edit');

    Route::post('/blog/{id}/edit','BlogController@update');

    Route::get('/blog/{id}/delete','BlogController@destroy');

    Route::get('/blog/{id}/show','BlogController@show');
  }
);


