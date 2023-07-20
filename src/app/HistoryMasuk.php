<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryMasuk extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip_address', 'OS', 'browser', 'user_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
