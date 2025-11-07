<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
//use App\Http\Controllers\Admin\AdminController;
//use App\Http\Controllers\Auth\LoginController;
//use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [ContactController::class, 'index'])->name('contacts.index'); //入力フォーム表示
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm'); //確認画面へ
Route::post('/store', [ContactController::class, 'store'])->name('contacts.store'); //データ保存
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contacts.thanks'); //サンクスページへ
//Route::get('/login', [LoginController::class, 'create'])->name('login');
//Route::post('/login', [LoginController::class, 'store']);
//Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// 管理画面（認証済ユーザーのみ）
//Route::middleware('auth')->group(function () {
   // Route::get('/admin', [ContactController::class, 'admin'])->name('admin.index');
   // Route::get('/admin/export', [ContactController::class, 'export'])->name('admin.export');
 //   Route::delete('/admin/{id}', [ContactController::class, 'destroy'])->name('admin.destroy');
//});

// 認証系（Fortifyを使用）
//Route::get('/register', [RegisterController::class, 'create'])->name('register');
//Route::post('/register', [RegisterController::class, 'store']);
//Route::get('/login', [LoginController::class, 'create'])->name('login');
//Route::post('/login', [LoginController::class, 'store']);
//Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
