<?php
use Illuminate\Support\Facades\Auth;

Route::get('index', 'CarsController@index_main');
Route::get('/', 'CarsController@index_main');
Route::get('home', 'CarsController@index_main');
Route::get('auto', 'CarsController@index');
Route::get('services', 'MainController@services');
Route::get('contact', 'MainController@contact');
Route::get('about_us', 'MainController@about_us');
Route::get('login', 'MainController@login');
Route::get('register', 'MainController@register');

Route::controllers([
   'auth'=>'AuthControll'
]);
Route::get('index/{id}', 'CarsController@show');
Route::get('auto/{id}', 'CarsController@show');


//admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/cars', 'AdminController@index');
Route::get('/admin/create', 'AdminController@create');
Route::get('/admin/cars/{id}', 'AdminController@car');
Route::get('/admin/delete/{id}', 'AdminController@delete');
Route::get('/admin/edit_status_block/{id}', 'AdminController@edit_status_block');
Route::get('/admin/edit_status_unblock/{id}', 'AdminController@edit_status_unblock');
Route::get('/admin/add_manager', 'AdminController@add_manager_view');
Route::get('/admin/control_users', 'AdminController@show_users');
Route::get('/admin/register_rent_period', 'AdminController@register_rent_period');
Route::get('/admin/rent_period', 'AdminController@rent_period');
Route::get('/admin/top_10_popular_auto', 'AdminController@top_10_popular_auto');
Route::get('/admin/audit/{id}', 'AdminController@audit');

Route::post('admin/create', 'AdminController@store');
Route::post('/admin/add_manager', 'AdminController@add_manager');
Route::post('admin/cars/{id}', 'AdminController@edit');
Route::post('/admin/register_rent_period', 'AdminController@register_rent_periodpost');
Route::post('/admin/rent_period', 'AdminController@rent_periodpost');



//manager
Route::get('/manager/contracts', 'ManagerController@show_unaccepted');
Route::get('/manager/return_car', 'ManagerController@return_car');
Route::get('/manager/accept_return/{id}/{car_id}', 'ManagerController@accept_return');
Route::get('/manager/unaccept_order/{id}', 'ManagerController@unaccept_order');
Route::get('/manager/crash_act/{id}', 'ManagerController@unaccept_order');
Route::get('/manager/show_rejection_order/{id}', 'ManagerController@show_rejection_order');
Route::get('/manager/home_manager', 'ManagerController@home_manager');
Route::post('/manager/email_rejection/{id}','ManagerController@post_rejection');

Route::get('/manager/create_contract/{id}', 'ManagerController@create_contract');
Route::post('/manager/contract/{id}/{car_id}', 'ManagerController@send_contract');

Route::get('/manager/create_act_return/{id}', 'ManagerController@create_act_return');


//user
Route::get('orders/{id}', 'ClientController@contracts');
Route::post('orders', 'ClientController@store');
Route:get('service','ClientController@service');
Route::post('cost_sort','CarsController@cost_sort');
Route::get('user','ClientController@user');
Route::get('orders_user','ClientController@orders_user');
Route::get('orders_his','ClientController@orders_his');
Route::get('cancel/{id}','ClientController@cancel' );

Route::get('search/{mark}','ClientController@search');

Route::get('usl_contracta','ClientController@usl_contracta');
Route::post('/user','ClientController@edit');
?>



























