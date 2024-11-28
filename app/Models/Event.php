<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'country_id', 'event_image', 'start_date', 'end_date', 'description', 'greeting'];

    //一対多リレーション：イベントを追加したユーザ
    public function user() {
        return $this->belongsTo(User::class);
    }

    //一対多リレーション：イベントが属する国
    public function country() {
        return $this->belongsTo(Country::class);
    }
}
