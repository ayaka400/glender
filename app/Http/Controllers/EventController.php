<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    private $event;
    private $country;

    public function __construct(Event $event, Country $country)
    {
        $this->event = $event;
        $this->country = $country;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 国別フィルタを取得（選択されていない場合はnull）
        $countryId = $request->input('country_id');

        // 国リストを取得
        $countries = $this->country->all();

        // イベントを取得（フィルタ適用）
        $query = $this->event->with('country');
        if ($countryId) {
            $query->where('country_id', $countryId);
        }
        $events = $query->get();

        return view('edit_events.select_event', compact('events', 'countries', 'countryId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //countriesテーブルのデータを取得してビューに渡す
        $countries = $this->country->all();
        return view('edit_events.add_event', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all()); // 送信データを確認
        
        // バリデーション
        $validated = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'event_name' => 'required|string|max:255',
            'event_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'greeting' => 'nullable|string',
        ]);

         // 現在のユーザーのIDを追加
        $validated['user_id'] = auth()->id();

        // イベント画像を保存
        if ($request->hasFile('event_image')) {
            $validated['event_image'] = $request->file('event_image')->store('event_images', 'public');
        }

        // dd($validated);

        // データを保存
        $event = $this->event->create($validated);

        // リダイレクト
        return redirect()->route('events.show', ['id' => $event->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // 指定されたイベントを取得
        $event = $this->event->with('country')->findOrFail($id); // 外部キー関係のcountryデータも取得
        return view('event', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // プロパティからイベントの情報を取得
        $event = $this->event->with('country')->findOrFail($id);

        //countriesテーブルのデータを取得してビューに渡す
        $countries = $this->country->all();

        // 指定されたイベントのデータをビューに渡して編集フォームを表示
        return view('edit_events.update_event', compact('event', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 該当イベントを取得
        $event = $this->event->findOrFail($id);

        // バリデーション
        $validated = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'event_name' => 'required|string|max:255',
            'event_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'greeting' => 'nullable|string',
        ]);

        // イベント画像を保存
        if ($request->hasFile('event_image')) {
            // 古い画像を削除
            if ($event->event_image) {
                Storage::disk('public')->delete($event->event_image);
            }
            $validated['event_image'] = $request->file('event_image')->store('event_images', 'public');
        }

        // データを更新
        $event->update($validated);

        // リダイレクト
        return redirect()->route('events.show', ['id' => $event->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = $this->event->findOrFail($id);

            // 画像ファイルを削除（存在すれば）
        if ($event->event_image) {
            Storage::delete('public/' . $event->event_image);
        }

        // イベントを削除
        $event->delete();

        // 削除後、一覧ページにリダイレクト
        return redirect()->route('events.select');
    }
    
}
