<?php

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

Route::get('/', 'HomeController@index')->name('homepage');

Route::get('/papers', 'PaperController@index')->name('papers.index');
Route::get('/papers/search', 'PaperController@search')->name('papers.search');

Route::get('/materials', 'MaterialController@index')->name('materials.index');
Route::get('/materials/search', 'MaterialController@search')->name('materials.search');
Route::get('/materials/{material}', 'MaterialController@show')->name('materials.show');
Route::get('/materials/users/{user}', 'MaterialController@user')->name('materials.user');

Route::get('/about', 'AboutController@index')->name('about');



// Register Controller Routes
Route::get('register', 'RegisterController@index')->name('register');
Route::post('register', 'RegisterController@register')->name('register');



// Login Controller Routes
Route::get('login', 'LoginController@show')->name('login.show');
Route::post('login', 'LoginController@login')->name('login');
Route::post('logout', 'LoginController@logout')->name('logout');






// Password Reset

Route::get('password/request', 'PasswordResetController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'PasswordResetController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'PasswordResetController@reset')->name('password.reset');







// Admin Routes

Route::get('admin', 'admin\AdminController@index')->name('admin.index');



Route::get('admin/users', 'admin\UserController@index')->name('admin.users');
Route::get('admin/users/{user}', 'admin\UserController@show')->name('admin.users.show');
Route::put('admin/users/{user}/activate', 'admin\UserController@activate')->name('admin.users.activate');
Route::put('admin/users/{user}/deactivate', 'admin\UserController@deactivate')->name('admin.users.deactivate');
Route::put('admin/users/{user}/approve', 'admin\UserController@approve')->name('admin.users.approve');
Route::put('admin/users/{user}/password_reset', 'admin\UserController@resetPassword')->name('admin.users.password_reset');


Route::put('admin/users/{user}/roles/{role}/add', 'admin\RoleController@add')->name('admin.users.roles.add');

Route::delete('admin/users/{user}/roles/{role}/delete', 'admin\RoleController@destroy')->name('admin.users.roles.destroy');



Route::get('admin/notifications', 'admin\NotificationController@index')->name('notifications.index');
Route::get('admin/notifications/{notification}', 'admin\NotificationController@show')->name('notifications.show');

Route::put('admin/notifications/mark-all-as-read', 'admin\NotificationController@markAllAsRead')->name('notifications.mark-all-as-read');
Route::delete('admin/notifications/delete', 'admin\NotificationController@delete')->name('notifications.delete');




Route::get('admin/settings/details', 'admin\SettingsController@details')->name('admin.settings.details');
Route::get('admin/settings/edit-details', 'admin\SettingsController@editDetails')->name('admin.settings.edit-details');
Route::get('admin/settings/edit-password', 'admin\SettingsController@editPassword')->name('admin.settings.edit-password');
Route::put('admin/settings/edit-details', 'admin\SettingsController@updateDetails')->name('admin.settings.update-details');
Route::put('admin/settings/edit-password', 'admin\SettingsController@updatePassword')->name('admin.settings.update-password');






// User Routes

Route::get('user', 'user\UserController@index')->name('user.index');


Route::get('user/settings/details', 'user\SettingsController@details')->name('user.settings.details');
Route::get('user/settings/edit-details', 'user\SettingsController@editDetails')->name('user.settings.edit-details');
Route::get('user/settings/edit-avatar', 'user\SettingsController@editAvatar')->name('user.settings.edit-avatar');
Route::get('user/settings/edit-password', 'user\SettingsController@editPassword')->name('user.settings.edit-password');
Route::put('user/settings/edit-details', 'user\SettingsController@updateDetails')->name('user.settings.update-details');
Route::put('user/settings/edit-password', 'user\SettingsController@updatePassword')->name('user.settings.update-password');
Route::put('user/settings/update-avatar', 'user\SettingsController@updateAvatar')->name('user.settings.update-avatar');
Route::delete('user/settings/delete-avatar', 'user\SettingsController@deleteAvatar')->name('user.settings.delete-avatar');


Route::get('user/papers', 'user\PaperController@index')->name('user.papers');
Route::get('user/papers/create', 'user\PaperController@create')->name('user.papers.create');
Route::post('user/papers/create', 'user\PaperController@store')->name('user.papers.store');
Route::get('user/papers/{paper}', 'user\PaperController@show')->name('user.papers.show');
Route::get('user/papers/{paper}/edit', 'user\PaperController@edit')->name('user.papers.edit');
Route::put('user/papers/{paper}', 'user\PaperController@update')->name('user.papers.update');
Route::delete('user/papers/{paper}', 'user\PaperController@destroy')->name('user.papers.destroy');


Route::get('user/materials', 'user\MaterialController@index')->name('user.materials');
Route::get('user/materials/create', 'user\MaterialController@create')->name('user.materials.create');
Route::post('user/materials', 'user\MaterialController@store')->name('user.materials.store');
Route::get('user/materials/{material}', 'user\MaterialController@show')->name('user.materials.show');
Route::get('user/materials/{material}/edit', 'user\MaterialController@edit')->name('user.materials.edit');
Route::put('user/materials/{material}', 'user\MaterialController@update')->name('user.materials.update');
Route::delete('user/materials/{material}', 'user\MaterialController@destroy')->name('user.materials.destroy');


Route::post('user/materials/{material}/files/upload', 'user\FileController@upload')->name('user.materials.files.upload');
Route::delete('user/materials/files/{file}/destroy', 'user\FileController@destroy')->name('user.materials.files.destroy');






// File Routes

// Route::get('file/open/{paper}', 'FileController@open')->name('paper.open');
Route::get('papers/{paper}/download', 'FileController@downloadPaper')->name('papers.download');
Route::get('material/{file}/download', 'FileController@downloadMaterial')->name('materials.download');

Route::get('materials/{material}/donwload/all', 'FileController@downloadAll')->name('materials.download.all');