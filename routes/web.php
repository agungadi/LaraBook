<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/rules', function () {
    return view('rules');
})->name('rules');

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/caribuku', [App\Http\Controllers\HomeController::class, 'caribuku'])->name('homesearch');

// Route::get('/home/search', 'HomeController@search')->name('homesearch');

Route::get('/home/pinjam/{id}', 'HomeController@tambahpinjam')->name('pinjambuku');
Route::post('/home/pinjam/konfirmasi', 'HomeController@konfirmasipinjam')->name('konfirmasipinjam');
Route::get('/home/riwayat', 'HomeController@daftarpinjam')->name('daftarpinjam');
Route::get('/home/riwayat/cari', [App\Http\Controllers\HomeController::class, 'caririwayat'])->name('riwayatsearch');

Route::delete('/home/riwayat/batalkan/{id}/{id_book}', 'HomeController@batalkan')->name('batalkan');

Route::get('/home/denda', 'HomeController@denda')->name('denda');
Route::get('/home/expired', [App\Http\Controllers\HomeController::class, 'expired'])->name('expired');

Route::resource('pinjam', UserController::class);


Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.welcome');
    })->name('welcome');


    Auth::routes(['verify' => true]);

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/search', 'HomeController@search');

    Route::get('/peminjaman', 'PinjamController@index')->name('pinjam');
    Route::get('/member', 'MemberController@index')->name('member');
    Route::get('/member/search', 'MemberController@search');
    // Route::get('/pinjam', 'PinjamController@index')->name('pinjam');

    Route::resource('buku', HomeController::class);
    Route::resource('pinjam', PinjamController::class);
    Route::get('/pinjam/selesai/{id_peminjaman}', 'PinjamController@dikembalika')->name('kembali');
    Route::get('/borrow/cari', 'PinjamController@cari');

    Route::resource('user', MemberController::class);

    // Route::resource('crud', HomeAdminController::class);

    // PDF
    Route::get('/pinjam/setujui/{id_peminjaman}', 'PinjamController@setujui')->name('setujui');

    Route::get('/pinjam/cetakpdf/{id_peminjaman}', 'PinjamController@cetakpdf')->name('cetak');

    Route::get('/pinjam/disetujui/{id_peminjaman}/{id_book}', 'PinjamController@disetujui')->name('disetujui');

});
