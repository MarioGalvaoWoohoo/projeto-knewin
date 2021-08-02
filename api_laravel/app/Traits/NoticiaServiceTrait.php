<?php

namespace App\Traits;

use App\Models\Noticia;

trait NoticiaServiceTrait
{
    public function registerNewsTrait($noticias)
    {
        try {
            
            foreach ($noticias as $key => $value) {
                $request = Noticia::create([
                        'titulo'           => $value['titulo'],
                        'subtitulo'        => $value['subtitulo'],
                        'conteudo'         => $value['conteudo'],
                        'fonte'            => $value['fonte'],
                        'data_publicacao'  => $value['data_publicacao'],
                        'url'              => $value['url']
                    ]);
            }

            return Response()->json([
                'status' => 201,
                'msg' => 'Noticias inseridas com sucesso'
            ]);

        } catch (\Exception $e) {
            return Response()->json([
                'status' => 401,
                'codeError' => $e->getCode() 
            ]);
        }
    }

    public function getAllNewsTrait()
    {
        try {

            return Noticia::all();

        } catch (\Exception $e) {
            return Response([
                'status' => $e->getCode(),
                'msg' => $e->getMessage()
            ]);
        }
    }
}