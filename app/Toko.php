<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'toko';

    protected $fillable = ['nama_toko','user_id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
