<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // 多対多リレーション：ユーザーが選択した国
    public function countries() {
        return $this->belongsToMany(Country::class, 'user_country_pivot');
    }

    // 一対多リレーション：ユーザーが追加した国（外部キーは countries テーブルの user_id）
    public function addedCountries() {
        return $this->hasMany(Country::class);
    }

    // 一対多リレーション：ユーザーが追加したイベント（外部キーは events テーブルの user_id）
    public function events() {
        return $this->hasMany(Event::class);
    }
}
