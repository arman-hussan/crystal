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


//frontend controller
Route::get('/','HomeController@index');
Route::get('/shop','HomeController@shop');
Route::get('/music','HomeController@music');
Route::get('/contact-us','HomeController@contact_us');
Route::get('/faq','HomeController@faq');
Route::get('/my-account','HomeController@my_account');


//music list
Route::get('/monihar','HomeController@monihar');
Route::get('/bandhu_tumi','HomeController@bandhu_tumi');
Route::get('/amar_ekta_nodi_chilo','HomeController@amar_ekta_nodi_chilo');
Route::get('/bazi','HomeController@bazi');
Route::get('/hridoyhina','HomeController@hridoyhina');
Route::get('/mohona','HomeController@mohona');
Route::get('/valobashi','HomeController@valobashi');
Route::get('/mon_bole','HomeController@mon_bole');
Route::get('/jajabar','HomeController@jajabar');
Route::get('/briddhasrom','HomeController@briddhasrom');
Route::get('/chirodini','HomeController@chirodini');
Route::get('/pram_amer','HomeController@pram_amer');
Route::get('/BULIEYA','HomeController@BULIEYA');
Route::get('/jhalak_dikhlaja','HomeController@jhalak_dikhlaja');
Route::get('/PIYA_BASANTI','HomeController@PIYA_BASANTI');
Route::get('/TERA_CHEHRA','HomeController@TERA_CHEHRA');
Route::get('/DIL_KYA_KARE','HomeController@DIL_KYA_KARE');
Route::get('/TUMHE_DILLAGI','HomeController@TUMHE_DILLAGI');
Route::get('/KOLER_GARI','HomeController@KOLER_GARI');
Route::get('/ONNO_SHOMOY','HomeController@ONNO_SHOMOY');
Route::get('/MAYER_HASHI','HomeController@MAYER_HASHI');
Route::get('/TRISHNA','HomeController@TRISHNA');
Route::get('/YAHKI_ALHUNIN','HomeController@YAHKI_ALHUNIN');
Route::get('/TERA_WADA','HomeController@TERA_WADA');
Route::get('/SATHI','HomeController@SATHI');
Route::get('/dilbar','HomeController@dilbar');
Route::get('/RONGDHONU','HomeController@RONGDHONU');
Route::get('/TUMAR_JONNO','HomeController@TUMAR_JONNO');






//backend route
Route::get('/llogin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','SuperAdminController@logout');





//catagory route
Route::get('/add-catagory','CatagoryController@index');
Route::get('/all-catagory','CatagoryController@all_catagory');
Route::post('/save-catagory','CatagoryController@save_catagory');




//product route
Route::get('/add-product','ProductController@index');
Route::get('/all-product','ProductController@all_product');
Route::post('/save-product','ProductController@save_product');


//show product
Route::get('/view_product/{product_id}','HomeController@product_details');
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-to-cart','CartController@update_to_cart');



//checkout 
Route::get('/checkout','CheckoutController@index');
Route::get('/login-check','CheckoutController@login_check');
Route::post('/save-shipping','CheckoutController@save_shipping');
Route::post('/customer_regestration','CheckoutController@customer_regestration');
Route::post('/customer_login','CheckoutController@customer_login');
Route::get('/customer_logout','CheckoutController@customer_logout');
Route::get('/payment','CheckoutController@payment');


Route::get('/manage-order','CheckoutController@manage_order');

Route::post('/contact-message','HomeController@contact_message');


//login
//my account route
Route::get('/my-account','MyAccountController@index');
Route::get('/entertainment','MyAccountController@all_music_entertainment');
Route::get('/entertainment_extra','MyAccountController@all_music_entertainment_extra');
Route::get('/total','MyAccountController@all_music_total');

