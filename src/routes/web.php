<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index'])->name('contacts.index'); //入力フォーム表示
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm'); //確認画面へ
Route::post('/store', [ContactController::class, 'store'])->name('contacts.store'); //データ保存
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contacts.thanks'); //サンクスページへ
Route::get('/admin', [ContactController::class, 'admin'])->name('admin.index'); //管理画面へ

