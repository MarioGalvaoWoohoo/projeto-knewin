<?php

namespace App\Traits;

trait NoticiaServiceTrait
{
    public function indexacaoNoticiasTrait($noticias)
    {
      
        return Response(["Teste" => "Chegou na Trait"]);
    }
}