<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akarkuadrat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'angka', 'akar_kuadrat'
    ];
}
