<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\WawancaraController;
use App\Http\Controllers\AdminController;
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

Route::group(['middleware' => 'prevent-back-history'],function(){
	
    Route::get('/', function () {
        return redirect()->route('register');
    });
    
    Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){
        Route::get('/home', [AdminController::class, 'index'])->name('dashboard');
    });
        
    Route::group(['middleware' => 'auth'], function(){
            Route::group(['middleware' => 'role'], function(){
                Route::get('/admin/detail/{nisn}', [AdminController::class, 'detail'])->name('detail');
                
                Route::get('/admin/user/verifikasi/{id}', [AdminController::class, 'verifikasi'])->name('verifikasi');
                Route::get('/admin/terima/{id}', [AdminController::class, 'terima'])->name('terima');
                Route::patch('/admin/tolak/{id}', [AdminController::class, 'tolak'])->name('tolak');
                Route::get('/admin/batal/{id}', [AdminController::class, 'batal'])->name('batal');
                Route::get('/admin/batalkan/{id}', [AdminController::class, 'batalkan']);
                
                Route::get('/admin/diverifikasi', [AdminController::class, 'diverifikasi'])->name('diverifikasi');
                Route::get('/admin/diterima', [AdminController::class, 'diterima'])->name('diterima');
                Route::get('/admin/pendaftar', [AdminController::class, 'pendaftar'])->name('pendaftar');
                Route::get('/admin/ditolak', [AdminController::class, 'ditolak'])->name('ditolak');
                Route::get('/admin/belum', [AdminController::class, 'belum'])->name('belum');
                Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
                
                Route::get('/admin/wawancara/{id}', [WawancaraController::class, 'index'])->name('wawancara');
                Route::patch('/admin/wawancara/store/{id}', [WawancaraController::class, 'store'])->name('wawancara.store');
            });
            
            Route::patch('/document/update/{id}', [DocumentController::class, 'update']);
            Route::patch('/document/delete/{id}', [DocumentController::class, 'destroy']);
            
            
            Route::get('/document', [DocumentController::class, 'tampil'])->name('doc');
            Route::get('/document/input', [DocumentController::class, 'create'])->name('input');
            Route::post('/document/input/store', [DocumentController::class, 'store'])->name('store');
        });
}); 