<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_name', 'user_target', 'prof_image',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
