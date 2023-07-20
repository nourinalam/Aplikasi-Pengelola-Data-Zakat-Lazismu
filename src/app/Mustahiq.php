<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mustahiq extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'area', 'jenismustahiq_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    public function jenismustahiq()
    {
        return $this->belongsTo(JenisMustahiq::class);
    }
}
