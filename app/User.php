<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * このユーザが所有する投稿。（ Micropostモデルとの関係を定義）
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    /**
     * このユーザに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('posts', 'favorites');
    }

    public function feed_posts()
    {
        // このユーザがフォロー中のユーザのidを取得して配列にする
        $userIds = $this->pluck('users.id')->toArray();
        // このユーザのidもその配列に追加
        $userIds[] = $this->id;
        // それらのユーザが所有する投稿に絞り込む
        return Post::whereIn('user_id', $userIds);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'post_id')->withTimestamps();
    }
    
    
    /**
     * $userIdで指定されたユーザをフォローする。
     *
     * @param  int  $userId
     * @return bool
     */
    public function favorite($postId)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->is_favoriting($postId);
        // 対象が自分自身かどうかの確認
        
        if ($exist) {
            // すでにお気に入りしていれば何もしない
            return false;
        } else {
            // 未お気に入りであればお気に入りする
            $this->favorites()->attach($postId);
            return true;
        }
    }

    /**
     * $userIdで指定されたユーザをアンフォローする。
     *
     * @param  int  $userId
     * @return bool
     */
    public function unfavorite($postId)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->is_favoriting($postId);
        // 対象が自分自身かどうかの確認

        if ($exist) {
            // すでにお気に入りしていればお気に入りを外す
            $this->favorites()->detach($postId);
            return true;
        } else {
            // 未お気に入りであれば何もしない
            return false;
        }
    }

    /**
     * 指定された $userIdのユーザをこのユーザがフォロー中であるか調べる。フォロー中ならtrueを返す。
     *
     * @param  int  $userId
     * @return bool
     */
    public function is_favoriting($postId)
    {
        // お気に入り中ユーザの中に $userIdのものが存在するか
        return $this->favorites()->where('post_id', $postId)->exists();
    }
}




