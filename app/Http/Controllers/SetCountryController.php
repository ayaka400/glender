<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetCountryController extends Controller
{   

    /**
     * 初回の国選択画面を表示
     */
    public function index()
    {
        // デフォルトの6カ国を表示
        $countries = Country::take(6)->get();
        return view('welcomes.1st_country_selection', compact('countries'));
    }

    /**
     * 初回の国選択を保存
     */
    public function store(Request $request)
    {
        $request->validate([
            'countries' => 'required|array|min:1', // countries フィールドが必須で、少なくとも1つ選択する
        ], [
            'countries.required' => '1つ以上の国を選んでください。',
            'countries.min' => '1つ以上の国を選んでください。'
        ]);

        $user = auth()->user();
        // 選択された国をユーザーに追加
        $user->countries()->sync($request->countries);
        return redirect()->route('home');
    }


    /**
     * ログイン後の国選択画面を表示
     */
    public function show()
    {
        $user = auth()->user();
        
        // 全ての国を取得
        $countries = Country::all();

        // ユーザーが選択している国を取得
        $selectedCountries = $user->countries->pluck('id')->toArray();

        return view('settings.country_setting', compact('countries', 'selectedCountries'));
    }

    /**
     * ログイン後の国選択変更を保存
     */
    public function update(Request $request)
    {
        $request->validate([
            'countries' => 'required|array|min:1', // countries フィールドが必須で、少なくとも1つ選択する
        ], [
            'countries.required' => '1つ以上の国を選んでください。',
            'countries.min' => '1つ以上の国を選んでください。'
        ]);


        $user = auth()->user();
        // ユーザーが選択した国を更新
        $user->countries()->sync($request->countries);
        return redirect()->route('home');
    }
    

}