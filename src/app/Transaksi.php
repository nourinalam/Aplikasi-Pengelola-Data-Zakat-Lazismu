<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'muzakki_id', 'user_id', 'jeniszakat_id', 'jiwa', 'beras_fitrah', 'uang_fitrah', 'fidyah', 'zakat_maal', 'infaq',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    public function muzakki()
    {
        return $this->belongsTo(Muzakki::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jeniszakat()
    {
        return $this->belongsTo(JenisZakat::class);
    }
}
