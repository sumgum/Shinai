<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyRecord extends Model
{
    protected $fillable = [
        'study_time', 'rest_time', 'etc_time', 'total_time','comment','study_flg', 'has_comment',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function favUsers_users() {
        return $this->hasMany('App\FavUser', 'user_id', 'user_id');
    }

    public function favUsers_fav_users() {
        return $this->hasMany('App\FavUser', 'fav_user_id', 'user_id');
    }

    public function userDetail() {
        return $this->hasOne('App\UserDetail', 'user_id', 'user_id');
    }

    public function scopeDayGreaterThan($query, $n) {
        return $query->where('created_at', '>=', $n);
    }

    public function scopeDayLessThan($query, $n) {
        return $query->where('created_at', '<=', $n);
    }
}
