<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(ContactRequest $request)
    {
        // ユーザー登録
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Fortify経由のログインページへリダイレクト
        return redirect()->route('login')->with('success', '登録が完了しました。ログインしてください。');
    }
}
