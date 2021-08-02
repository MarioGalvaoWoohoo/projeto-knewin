<?php

namespace App\Traits;

trait NoticiaServiceTrait
{
    public function verificaCamposNoticiasTrait($noticias)
    {
        $noticiasNew = array_map(function($noticias){
            if(!isset($noticias->subtitulo))
                $noticias->subtitulo = "null";
                
            if(!isset($noticias->titulo))
                $noticias->titulo = "null";
                
            if(!isset($noticias->conteudo))
                $noticias->conteudo = "null";
                
            if(!isset($noticias->fonte))
                $noticias->fonte = "null";
            
            if(!isset($noticias->data_publicacao))
                $noticias->data_publicacao = "null";
            
            if(!isset($noticias->url))
                $noticias->url = "null"; 
                
            return $noticias;
        }, $noticias);

        return $noticiasNew;
    }

    public function verificaJsonTrait($json)
    {
        $noticias_decode = json_decode($json);
        $json_last_error = json_last_error();

        if($json_last_error != 0){
            switch ($json_last_error) {
                case JSON_ERROR_NONE:
                    return 'No errors';
                break;
                case JSON_ERROR_DEPTH:
                    return Response(['status' => false, 'noticias' => '', 'error_json' => 'Profundidade máxima da pilha excedida']);
                break;
                case JSON_ERROR_STATE_MISMATCH:
                    return Response(['status' => false, 'noticias' => '', 'error_json' => 'Fluxo insuficiente ou incompatibilidade de modos']);
                break;
                case JSON_ERROR_CTRL_CHAR:
                    return Response(['status' => false, 'noticias' => '', 'error_json' => 'Caractere de controle inesperado encontrado']);
                break;
                case JSON_ERROR_SYNTAX:
                    return Response(['status' => false, 'noticias' => '', 'error_json' => 'Erro de sintaxe, JSON malformado']);
                break;
                case JSON_ERROR_UTF8:
                    return Response(['status' => false, 'noticias' => '', 'error_json' => 'Caracteres UTF-8 malformados, possivelmente codificados incorretamente']);
                break;
                default:
                    return Response(['status' => false, 'noticias' => '', 'error_json' => 'Erro desconhecido']);
                break;
            }
        }

        return Response(['status' => true, 'noticias' => $noticias_decode, 'error_json' => '']);
        
    }

    public function importaNoticiasApiTrait($noticias)
    {

        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://nginx/api/noticias/recebeNoticias',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($noticias),
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json"
                ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);

            $response = ['status' => 201, 'msg' => 'Dados importados com sucesso'];

            return $response;

        } catch (\Throwable $th) {
            
            return Response([
                'status' => 401,
                'msg' => "Erro na importação dos dados."
            ], 400);
            
        }

        
    }
}