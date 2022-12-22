<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function detailruangan() {
        return $this->belongsTo(Detail_ruangan::class);
    }

    public function fasilitases() {
        return $this->belongsToMany(Fasilitas::class, 'checkout_fasilitas');
    }
}
