<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        // 選択した国に関連するイベントを取得
        $events = Event::whereIn('country_id', $countries->pluck('id')) // 選択された国のイベントを取得
            // ->where('start_date', '>=', Carbon::now()) // 現在以降のイベント
            ->orderBy('start_date', 'asc') // 開始日でソート
            ->get();

        // 今月のイベントを取得
        $now = Carbon::now();
        $startOfMonth = $now->startOfMonth()->toDateString();
        $endOfMonth = $now->endOfMonth()->toDateString();
        $thisMonthEvents = $events->filter(function ($event) use ($startOfMonth, $endOfMonth) {
            return $event->start_date >= $startOfMonth && $event->start_date <= $endOfMonth;
        });

        return view('home', compact('countries', 'events', 'thisMonthEvents'));
    }
}
