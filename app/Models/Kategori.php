<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function detail_ruangan()
    {
        return $this->hasMany(Detail_ruangan::class);
    }
}
