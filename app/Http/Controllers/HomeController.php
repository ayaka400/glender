<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $country;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Country $country)
    {
        $this->middleware('auth');
        $this->country = $country;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         // ログイン中のユーザーが選択した国を取得
        $user = auth()->user();
        $countries = $user->countries; // ユーザーが選択した国のみ取得

        return view('home', compact('countries'));
    }
}
