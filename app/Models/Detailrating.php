<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailrating extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detailruangan(){
        return $this->belongsTo('App\Models\Detail_ruangan');
    }
}
