<?php

namespace App\Http\Controllers;

use Elasticsearch\Client;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use App\Traits\NoticiaServiceTrait;

class ElasticSearchController extends Controller
{
    use NoticiaServiceTrait;

    private $client;

    protected $elasticParams = [];

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->elasticParams['index'] = 'noticias_2';
        $this->elasticParams['type'] = '_doc';

        $client = ClientBuilder::create()->setHosts(['elasticsearch:9200'])->build();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $noticias = $this->client->search(['index' => 'noticias_2']);
        
        return view('elasticSearch/listaNoticias', compact('noticias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registraNoticiasElastic()
    {
        $noticias = $this->getAllNewsTrait();

        foreach ($noticias as $key => $value) {
            # code...
        }
        
        return $this->registerNewsElasticTrait($noticias);
    }
}
