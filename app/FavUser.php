<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavUser extends Model
{

    protected $fillable = [
        'user_id', 'fav_user_id', 'fav_flg'
    ];

    public function users() {
        return $this->belongsTo('App\User');
    }
}
