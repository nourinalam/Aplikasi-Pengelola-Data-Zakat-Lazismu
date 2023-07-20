<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisMustahiq extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis', 'keterangan', 'jumlah_bagian', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    public function mustahiqs()
    {
        return $this->hasMany(Mustahiq::class);
    }
}
