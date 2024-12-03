<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'user_id' => 1, 
                'country_id' => 1, 
                'event_name' => '春節',
                'event_image' => 'event_images/c_1.jpg',
                'start_date' => '2025-01-29', 
                'end_date' => '2025-02-5', 
                'description' => '中国最大の祝日。家族で集まり、一年の繁栄と健康を祈る。赤い装飾で家を飾り、爆竹を鳴らし、新年を迎える。',
                'greeting' => '新年快乐(Xīn nián kuài lè)シン ニエン クアイ ロー「新年おめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 1, 
                'event_name' => '中秋節',
                'event_image' => 'event_images/c_2.jpg',
                'start_date' => '2025-10-6', 
                'end_date' => null, 
                'description' => '満月を祝う日。家族で月餅を食べ、月を見上げて団欒を楽しむ。家庭と再会の象徴とされる。',
                'greeting' => '中秋快乐(Zhōng qiū kuài lè)ジョン チウ クアイ ロー「中秋おめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 1, 
                'event_name' => '国慶節',
                'event_image' => 'event_images/c_3.jpg',
                'start_date' => '2025-10-1', 
                'end_date' => '2025-10-7', 
                'description' => '中華人民共和国の建国記念日。全国で祝賀行事が行われ、観光地やショッピングが賑わう。',
                'greeting' => '国庆快乐(Guó qìng kuài lè) グオ チン クアイ ロー「建国記念おめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 2, 
                'event_name' => 'テト(旧正月)',
                'event_image' => 'event_images/v_1.jpg',
                'start_date' => '2025-1-28', 
                'end_date' => '2025-2-3', 
                'description' => 'ベトナム最大の祝日。家族で祖先を祀り、伝統的な食事（バインチュンなど）を楽しむ。新しい一年を祈願する期間。',
                'greeting' => 'Chúc Mừng Năm Mới(チュック ムン ナム モイ)「新年おめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 2, 
                'event_name' => '中秋節',
                'event_image' => 'event_images/v_2.jpg',
                'start_date' => '2025-10-6', 
                'end_date' => null, 
                'description' => '子供たちのお祝いの日でもあり、ランタン遊びや月餅作りが盛ん。家庭や団欒を祝う日。',
                'greeting' => 'Tết Trung Thu vui vẻ (テット チュン トゥー ヴイ ヴェー)「中秋節おめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 2, 
                'event_name' => '国慶節',
                'event_image' => 'event_images/v_3.jpg',
                'start_date' => '2025-9-2', 
                'end_date' => null, 
                'description' => 'ベトナムの建国記念日。全国でパレードや花火が行われる。家族や友人と過ごす人が多い。',
                'greeting' => 'Chúc Mừng Quốc Khánh(チュック ムン クオック カイン)「建国記念おめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 3, 
                'event_name' => '聖週間（ホーリーウィーク）',
                'event_image' => 'event_images/p_1.jpg',
                'start_date' => '2025-4-13', 
                'end_date' => '2025-4-19', 
                'description' => 'キリスト教行事。聖金曜日や復活祭が重要視される。祈り、断食、家族との時間を過ごす。',
                'greeting' => 'Maligayang Pasko ng Pagkabuhay (マリガヤン パスコ ナグ パグカブハイ)「復活祭おめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 3, 
                'event_name' => '独立記念日',
                'event_image' => 'event_images/p_2.jpg',
                'start_date' => '2025-6-12', 
                'end_date' => null, 
                'description' => 'フィリピンがスペインから独立した日を記念。国旗掲揚や歴史的行事が行われる。',
                'greeting' => 'Maligayang Araw ng Kalayaan (マリガヤン アラウ ナグ カラヤアン)「独立記念日おめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 3, 
                'event_name' => 'クリスマス',
                'event_image' => 'event_images/p_3.jpg',
                'start_date' => '2024-12-25', 
                'end_date' => null, 
                'description' => '一年で最も盛り上がる最大のイベント。会社、家族、様々なコミュニティでパーティーが開催される。9月からクリスマスシーズンとなり、世界で最も長いと言われる。',
                'greeting' => 'Maligayang Pasko (マリガヤン パスコ)「メリークリスマス」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 4, 
                'event_name' => 'ダサイン (Dashain)',
                'event_image' => 'event_images/n_1.jpg',
                'start_date' => '2025-10-30', 
                'end_date' => '2025-11-12', 
                'description' => 'ヒンドゥー教最大の祭りで、悪に対する善の勝利を祝う。家族が集まり、動物の供犠やお守りの贈呈が行われる。',
                'greeting' => 'Happy Dashain「ダサインおめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 4, 
                'event_name' => 'ティハール (Tihar)',
                'event_image' => 'event_images/n_2.jpg',
                'start_date' => '2025-10-21', 
                'end_date' => '2025-10-25', 
                'description' => 'ネパール版ディワリで光の祭り。家庭内で神々を祀り、灯火や飾り付けで祝う。特に兄弟姉妹の絆を称える儀式も行われる。',
                'greeting' => 'Subha Deepawali スバ・ディーパワリ「幸せな光の祭りを」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 4, 
                'event_name' => 'ホーリ (Holi)',
                'event_image' => 'event_images/n_3.jpg',
                'start_date' => '2025-3-14', 
                'end_date' => '2025-3-15', 
                'description' => '色彩の祭りで、春の訪れを祝う。人々がカラーパウダーや水を投げ合い、音楽や踊りを楽しむ。',
                'greeting' => 'होलीको शुभकामना (Holiko Subhakamana)ホーリコ・シュバカマナ「ホーリ祭おめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 5, 
                'event_name' => 'ラマダン (Ramadan)',
                'event_image' => 'event_images/i_1.jpg',
                'start_date' => '2025-2-28', 
                'end_date' => '2025-3-29', 
                'description' => '断食月で、イスラム教徒が日の出から日没まで断食を行い、信仰を深める。断食後の夕食「イフタール」で家族や友人と集う。',
                'greeting' => 'رمضان مبارك (Ramadan Mubarak)ラマダン・ムバラク「ラマダンおめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 5, 
                'event_name' => 'イドゥル・フィトリ (Idul Fitri)',
                'event_image' => 'event_images/i_2.jpg',
                'start_date' => '2025-3-30', 
                'end_date' => '2025-3-31', 
                'description' => 'ラマダン明けの祭りで、断食月の終わりと新たな始まりを祝う。家族訪問や贈り物交換、特別な料理を楽しむ。',
                'greeting' => 'Selamat Idul Fitriスラマット・イドゥル・フィトリ「イドゥル・フィトリおめでとう」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 5, 
                'event_name' => '独立記念日 (Hari Kemerdekaan)',
                'event_image' => 'event_images/i_3.jpg',
                'start_date' => '2025-8-17', 
                'end_date' => null, 
                'description' => 'インドネシアの独立を祝う国家的な祝日。旗揚げ式や式典、伝統的な競技大会が開催され、国民全体で祝う。',
                'greeting' => 'Merdeka!メルデカ「自由！」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 6, 
                'event_name' => 'ティンジャン (Thingyan)',
                'event_image' => 'event_images/m_1.jpg',
                'start_date' => '2025-4-13', 
                'end_date' => '2025-4-16', 
                'description' => 'ミャンマーの水かけ祭りで新年の到来を祝う。人々が互いに水をかけ合い、悪運を洗い流すと信じられている。',
                'greeting' => 'သင်္ကြန်ကောင်းတယ် (Thingyan Kaung Tal)ティンジャン・カウンテー「良いティンジャンを」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 6, 
                'event_name' => 'ワソー満月祭 (Waso Full Moon Festival)',
                'event_image' => 'event_images/m_2.jpg',
                'start_date' => '2025-7-9', 
                'end_date' => null, 
                'description' => '仏教の雨季入りを示す祭り。僧侶が雨季の修行に入る準備を整え、信徒が寄付を行う。',
                'greeting' => 'သီတင်းကျွတ် (Thadingyut)ティダンギュ「幸せな祝福を」', 
            ],
            [
                'user_id' => 1, 
                'country_id' => 6, 
                'event_name' => '光の祭り (Thadingyut)',
                'event_image' => 'event_images/m_3.jpg',
                'start_date' => '2025-10-5', 
                'end_date' => '2025-10-7', 
                'description' => '仏教の祭りで、雨季修行を終えた僧侶を迎える。家庭や寺院が灯で飾られ、家族や隣人が集う。',
                'greeting' => 'သီတင်းကျွတ်ကောင်းတယ် (Thadingyut Kaung Tal)ティダンギュ・カウンテー「良い光の祭りを」', 
            ]
        ];

         // データを挿入
         DB::table('events')->insert($events);
    }
}
