<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function geup()
    {
        return $this->belongsTo(Geup::class);
    }
    public function nilai()
    {
        return $this->hasOne(Nilai::class);
    }
}