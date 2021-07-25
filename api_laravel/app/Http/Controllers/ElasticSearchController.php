<?php

namespace App\Http\Controllers;

use Elasticsearch\Client;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;

class ElasticSearchController extends Controller
{
    public function index()
    {
        // $client = ClientBuilder::create()->build();

        $client = ClientBuilder::create()
            ->setHosts(['elasticsearch:9200'])
            ->build();

        // $params = [
        //     'index' => 'my_index',
        //     'id' => 'my_id',
        //     'body' => ['testField' => 'abc']
        //     ];

        // $result = $client->index($params);

        for ($i=0; $i < 100; $i++) { 
            $params['body'][] = [
                'index' => [
                    '_index' => 'my_index',
                ]
            ];
            $params['body'][] = [
                'my_field' => 'my_value',
                'second_field' => 'some more value'
            ];
        }
        
        $result = $client->bulk($params);
        
        return json_encode($result);

        // dd($result);


        return view('elasticSearch/teste');
    }
}
