<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // セッションから保存済みの入力を取得（なければ空配列）
        $inputs = $request->session()->get('inputs', []);

        $categories = Category::all();

        return view('contacts.form', compact('categories', 'inputs'));
    }

    public function confirm(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'last_name'   => 'required',
            'first_name'  => 'required',
            'gender'      => 'required',
            'email'       => 'required|email',
            'tel_first'   => 'required|digits_between:1,5|numeric',
            'tel_second'  => 'required|digits_between:1,5|numeric',
            'tel_third'   => 'required|digits_between:1,5|numeric',
            'address'     => 'required',
            'building'    => 'nullable|string|max:255',
            'category_id' => 'required',
            'detail'      => 'required|max:120',
        ]);

        // 電話番号を結合して1つの値に（必要ならハイフン無し）
        $validated['tel'] = $validated['tel_first'] . $validated['tel_second'] . $validated['tel_third'];

        // カテゴリ名を追加（表示用）
        $category = Category::find($validated['category_id']);
        $validated['category_name'] = $category ? $category->content : '';

        // セッションに保存（修正で戻ったときに使う）
        $request->session()->put('inputs', $validated);

        // 確認画面へ（ビュー名は contacts.confirm など実ファイル名に合わせて下さい）
        return view('contacts.confirm', ['inputs' => $validated]);
    }

    public function store(Request $request)
    {
        // 修正ボタンを押すときはここに来ない想定（修正は GET にしているため）
        // 送信処理はセッションから取得して保存するのが安全
        $inputs = $request->session()->get('inputs', []);

        // 必要なら再度バリデーション（省略可）
        // 保存
        Contact::create([
            'last_name'   => $inputs['last_name'],
            'first_name'  => $inputs['first_name'],
            'gender'      => $inputs['gender'],
            'email'       => $inputs['email'],
            'tel'         => $inputs['tel'],
            'address'     => $inputs['address'],
            'building'    => $inputs['building'] ?? null,
            'category_id' => $inputs['category_id'],
            'detail'      => $inputs['detail'],
            // 'user_id' => auth()->id(), // 必要なら追加
        ]);

        // セッションを消す
        $request->session()->forget('inputs');

        // サンクスへ
        return redirect()->route('contacts.thanks');
    }

    public function thanks()
    {
        return view('contacts.thanks');
    }

    public function admin(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(10);

        return view('contacts.admin',compact('contacts','categories'));
    }
}
