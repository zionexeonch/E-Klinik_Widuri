<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjanjian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'pasien_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }
}
