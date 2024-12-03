<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * ユーザー情報変更画面を表示
     */
    public function edit()
    {
        $user = Auth::user(); // ログイン中のユーザー情報を取得
        return view('settings.user_setting', compact('user'));
    }


     /**
     * ユーザー情報を更新
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // バリデーション
        $request->validate([
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'min:8'], // password_confirmation フィールドと一致をチェック
        ]);

        // ユーザー情報を更新
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return redirect()->route('user.settings')->with('success', 'ユーザー情報を更新しました！');
    }


}
