<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    private $country;

    public function __construct(Country $country) {
        $this->country = $country;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('countries.add_country');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'country_name' => 'required|string|max:255',
            'capital' => 'nullable|string|max:255',
            'lang' => 'nullable|string|max:255',
            'relig' => 'nullable|string|max:255',
            'tourist_spot' => 'nullable|string|max:255',
            'other_desc' => 'nullable|string',
            'greeting' => 'nullable|string',
            'flag_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 現在のユーザーの ID を追加
        $validatedData['user_id'] = auth()->id();

        // 画像ファイルの保存
        if ($request->hasFile('flag_image')) {
            $filePath = $request->file('flag_image')->store('flags', 'public');
            $validatedData['flag_image'] = $filePath;
        }

        // データ保存
        $country = $this->country->create($validatedData);

        // 保存したデータを show メソッドで表示
        return redirect()->route('countries.show', ['id' => $country->id]);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // 指定したIDの国を取得
        $country = $this->country->findOrFail($id); // IDが見つからなければ404エラー

        // ビューにデータを渡して表示
        return view('countries.country', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // プロパティから国の情報を取得
        $country = $this->country->findOrFail($id);

        // 指定された国のデータをビューに渡して編集フォームを表示
        return view('countries.update_country', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // バリデーション
        $validatedData = $request->validate([
            'country_name' => 'required|string|max:255',
            'capital' => 'nullable|string|max:255',
            'lang' => 'nullable|string|max:255',
            'relig' => 'nullable|string|max:255',
            'tourist_spot' => 'nullable|string|max:255',
            'other_desc' => 'nullable|string',
            'greeting' => 'nullable|string',
            'flag_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $country = $this->country->findOrFail($id);

        // 画像ファイルの保存（変更があれば）
        if ($request->hasFile('flag_image')) {
            // 既存の画像があれば削除
            if ($country->flag_image) {
                Storage::delete('public/' . $country->flag_image);
            }
            // 新しい画像を保存
            $filePath = $request->file('flag_image')->store('flags', 'public');
            $validatedData['flag_image'] = $filePath;
        }

        // 国情報の更新
        $country->update($validatedData);

        // 更新後、詳細ページへリダイレクト
        return redirect()->route('countries.show', ['id' => $country->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $country = $this->country->findOrFail($id);

            // 画像ファイルを削除（存在すれば）
        if ($country->flag_image) {
            Storage::delete('public/' . $country->flag_image);
        }

        // 国情報を削除
        $country->delete();

        // 削除後、一覧ページにリダイレクト
        return redirect()->route('country-setting.show');
    }
}
