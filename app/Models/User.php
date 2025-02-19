<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'bio',
        'icon_image'
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

    //リレーション定義を追加
    //「１対多」の「多」側 → メソッド名は複数形でhasManyを使う
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function following()//フォローしているユーザーの取得
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
//使用するクラス、使用するテーブル（中間テーブル）、フォローする方のid、フォローされる方のid
    }

    public function followed()//フォローされているユーザーの取得
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
//使用するクラス、使用するテーブル（中間テーブル）、フォローされる方のid、フォローする方のid
    }

    public function follow(Int $user_id)//フォロー追加するためのメソッド
    {
        return $this->following()->attach($user_id);
    }

    public function unfollow(Int $user_id)//フォロー解除するためのメソッド
    {
        return $this->following()->detach($user_id);
    }

// フォローしているか
    public function isFollowing(Int $user_id)
    {
    return (bool) $this->following()->where('followed_id', $user_id)->first(['follows.id']);//どっちのテーブル名なの？＋.カラム名
    }

// フォロー数を取得
    public function getFollowersCount()
    {
        return $this->following()->count();
    }

// フォロワー数を取得
    public function getFollowingCount()
    {
        return $this->followed()->count();
    }

}
