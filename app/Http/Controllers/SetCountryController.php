<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetCountryController extends Controller
{
    /**
     * 国選択ページを表示するメソッド
     */
    public function showSelectionForm() {
        // デフォルトの国を取得
        $countries = Country::all(); //デフォルトでは全ての国
        return view('welcomes.country_selection', compact('countries'));
    }

    /**
     * ユーザが選択した国を保存
     */
    

}


// , compact('countries')