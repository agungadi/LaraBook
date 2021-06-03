<?php

use App\Http\Controllers\UserController;
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


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/pinjam/{id}', 'HomeController@tambahpinjam')->name('pinjambuku');
Route::post('/home/pinjam/konfirmasi', 'HomeController@konfirmasipinjam')->name('konfirmasipinjam');
Route::get('/home/riwayat', 'HomeController@daftarpinjam')->name('daftarpinjam');
Route::delete('/home/riwayat/batalkan/{id}/{id_book}', 'HomeController@batalkan')->name('batalkan');

Route::resource('pinjam', UserController::class);


Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.welcome');
    })->name('welcome');


    Auth::routes(['verify' => true]);

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/peminjaman', 'PinjamController@index')->name('pinjam');
    Route::get('/member', 'MemberController@index')->name('member');

    // Route::get('/pinjam', 'PinjamController@index')->name('pinjam');

    Route::resource('buku', HomeController::class);
    Route::resource('pinjam', PinjamController::class);
    Route::get('/pinjam/selesai/{id_peminjaman}', 'PinjamController@dikembalikan')->name('kembali');

    Route::resource('user', MemberController::class);

    // Route::resource('crud', HomeAdminController::class);


});
