<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class character extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'gender',
        'race',
        'class',
        'name',
        'hair',
        'skin',
        'eyes',
        'age',
        'size',
        'weight',
        'appearance'

    ];
}
