<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectWisata extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lokasi', 'pembeli_id'];
}
