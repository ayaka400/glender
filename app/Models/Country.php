<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['country_name', 'user_id', 'description', 'greeting', 'flag_image'];

    // 多対多リレーション：ユーザーが選択した国
    public function users() {
        return $this->belongsToMany(User::class, 'user_country_pivot');
    }

    // 一対多リレーション：国が1人のユーザーに関連付けられる
    public function user() {
        return $this->belongsTo(User::class);
    }

    //一対多リレーション：国は複数のイベントを持つ
    public function events() {
        return $this->hasMany(Event::class);
    }
}
