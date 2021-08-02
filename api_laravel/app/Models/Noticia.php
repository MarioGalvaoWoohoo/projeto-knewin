<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = "noticias";

    protected $fillable = [
        'titulo',
        'subtitulo',
        'conteudo',
        'fonte',
        'data_publicacao',
        'url'
    ];
}
