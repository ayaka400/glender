<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage;


class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'user_id' => 1, // 初期データでは特定ユーザではなく一般情報とする
                'country_name' => '中国',
                'capital' => '北京',
                'lang' => '中国語',
                'relig' => '仏教、道教、儒教、無宗教',
                'tourist_spot' => '万里の長城、紫禁城、桂林山水',
                'other_desc' => '世界最大の人口を持つ国、古代文明の発祥地の一つ。',
                'greeting' => 'こんにちは: 你好（ニーハオ）
                                ありがとう: 谢谢（シェシェ）',
                'flag_image' => 'flags/china.svg',
            ],
            [
                'user_id' => 1,
                'country_name' => 'ベトナム',
                'capital' => 'ハノイ',
                'lang' => 'ベトナム語',
                'relig' => '仏教、キリスト教、無宗教',
                'tourist_spot' => 'ハロン湾、ホイアン古街、フエの王宮',
                'other_desc' => 'コーヒー生産量で世界トップクラス、アオザイなど独自文化が豊か。',
                'greeting' => 'こんにちは: Xin chà(シンチャオ)
                                ありがとう: Cảm ơn(カムオン)',
                'flag_image' => 'flags/vietnam.svg',
            ],
            [
                'user_id' => 1,
                'country_name' => 'フィリピン',
                'capital' => 'マニラ',
                'lang' => 'フィリピノ語、英語',
                'relig' => 'キリスト教、その他',
                'tourist_spot' => 'ボラカイ島、チョコレートヒルズ、エルニド',
                'other_desc' => '7000以上の島々で構成される、英語話者が多い。',
                'greeting' => 'こんにちは: Kumusta(クムスタ)
                                ありがとう: Salamat(サラマット)',
                'flag_image' => 'flags/philippines.svg',
            ],
            [
                'user_id' => 1,
                'country_name' => 'ネパール',
                'capital' => 'カトマンズ',
                'lang' => 'ネパール語',
                'relig' => 'ヒンドゥー教、その他',
                'tourist_spot' => 'エベレスト、ポカラ、ルンビニ（仏陀の生誕地）',
                'other_desc' => '世界最高峰エベレストがある、多民族国家、独自の寺院建築が有名。',
                'greeting' => 'こんにちは: नमस्ते（ナマステ）
                                ありがとう: धन्यवाद（ダンニャバード）',
                'flag_image' => 'flags/nepal.svg',
            ],
            [
                'user_id' => 1,
                'country_name' => 'インドネシア',
                'capital' => 'ジャカルタ',
                'lang' => 'インドネシア語',
                'relig' => 'イスラム教、キリスト教、その他',
                'tourist_spot' => 'バリ島、ボロブドゥール寺院、コモド島',
                'other_desc' => '世界最多のイスラム教徒を擁する国、多島嶼国家(約17,000の島々)',
                'greeting' => 'こんにちは: Selamat siang (セゥラマット シアン, 10:00~16:00) / Selamat sore (セゥラマット ソーレ, 16:00~18:00)
                                ありがとう: Terima kasih(テリマカシ)',
                'flag_image' => 'flags/indonesia.svg',
            ],
            [
                'user_id' => 1,
                'country_name' => 'ミャンマー',
                'capital' => 'ネピドー',
                'lang' => 'ビルマ語（ミャンマー語）',
                'relig' => '仏教、その他',
                'tourist_spot' => 'バガン遺跡群、シュエダゴン・パゴダ、、インレー湖',
                'other_desc' => 'ゴールデンパゴダなど黄金の仏教建築が特徴、ビルマ文字が独特。',
                'greeting' => 'こんにちは: မင်္ဂလာပါ（ミンガラバー）
                                ありがとう: ကျေးဇူးတင်ပါတယ်（チェーズーティンバーデー）',
                'flag_image' => 'flags/myanmar.svg',
            ]
        ];

        DB::table('countries')->insert($countries);
    }
}
