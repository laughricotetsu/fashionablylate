<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * 入力画面表示
     */
    public function index()
    {
        $categories = \App\Models\Category::all();
        return view('contacts.form', compact('categories'));
    }
    /**
     * 確認画面表示
     */
    public function confirm(Request $request)
{
        $validated = $request->validate([
        'last_name' => 'required',
        'first_name' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'tel_first' => 'required|digits_between:1,5|numeric',
        'tel_second' => 'required|digits_between:1,5|numeric',
        'tel_third' => 'required|digits_between:1,5|numeric',
        'address' => 'required',
        'building' => 'nullable|string|max:255',
        'category_id' => 'required',
        'detail' => 'required|max:120',
    ]);

    $validated['tel'] = $validated['tel_first'] . $validated['tel_second'] . $validated['tel_third'];

    return view('contacts.confirm',['inputs'=> $validated]);

  // カテゴリー名を取得
    $category = \App\Models\Category::find($validated['category_id']);
    $validated['category_name'] = $category ? $category->content : '';

    return view('contacts.confirm', [
        'inputs' => $validated
    ]);
}

public function store(Request $request)
    {
        $action = $request->input('action');

        // 「修正」ボタンが押された場合はフォームに戻る
        if ($action === 'back') {
        return redirect()->route('contacts.index')->withInput();
        }

        // データをDBに保存
        Contact::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'address' => $request->input('address'),
            'category_id' => $request->input('category_id'),
            'detail' => $request->input('detail'),
        ]);

       // \App\Models\Contact::create($validated);

        return redirect()->route('contacts.thanks');
    }

    public function thanks()
    {
        return view('contacts.thanks');
    }
}


