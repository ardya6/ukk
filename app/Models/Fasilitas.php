<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $guarded = ['id'];

    public function checkouts() {
        return $this->belongsToMany(Checkout::class, 'checkout_fasilitas');
    }

    public function ruangan(){
        return $this->belongsToMany(Detail_ruangan::class,'fasilitas_ruangans');
    }
}
