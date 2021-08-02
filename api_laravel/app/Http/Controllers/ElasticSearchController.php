<?php

namespace App\Http\Controllers;

use Elasticsearch\Client;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;

class ElasticSearchController extends Controller
{
    public function index()
    {
        $client = ClientBuilder::create()->setHosts(['elasticsearch:9200'])->build();

        $params = [
            'index' => 'noticias_novas',
            'id' => 'my_id',
            'body' => ['testField' => 'abc']
            ];

        if(!$client->exists(['index' => 'noticias_novas', 'id' => 'my_id'])){
            $result = $client->index($params);
            return json_encode($result);
        }else{
            return Response(['status' => "Index já Existe"]);
        }

    }
}
