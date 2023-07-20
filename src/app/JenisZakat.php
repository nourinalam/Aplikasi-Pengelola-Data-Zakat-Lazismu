<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisZakat extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis', 'nominal',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
