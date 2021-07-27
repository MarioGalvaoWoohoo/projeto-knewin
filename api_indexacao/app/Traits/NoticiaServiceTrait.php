<?php

namespace App\Traits;

trait NoticiaServiceTrait
{
    public function indexacaoNoticiasTrait($noticias)
    {
        foreach ($noticias as $key => $value) {
            if(!isset($value->subtitulo)){
                $value->subtitulo = null;
            }
            if(!isset($value->titulo)){
                $value->titulo = null;
            }
            if(!isset($value->conteudo)){
                $value->conteudo = null;
            }
            if(!isset($value->fonte)){
                $value->fonte = null;
            }
            if(!isset($value->data_publicacao)){
                $value->data_publicacao = null;
            }
            if(!isset($value->url)){
                $value->url = null;
            }
        }
        
        return $noticias;
    }
}