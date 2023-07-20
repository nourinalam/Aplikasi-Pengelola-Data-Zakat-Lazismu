<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muzakki extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'nohp', 'alamat', 'jeniskelamin',
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
