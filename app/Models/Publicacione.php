<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacione extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cliente',
        'publicacion',
        'postimagen',
        'likes',
    ];
}
