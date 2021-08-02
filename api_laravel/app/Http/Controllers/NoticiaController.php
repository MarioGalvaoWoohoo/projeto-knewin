<?php

namespace App\Http\Controllers;

use Elasticsearch\Client;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use App\Traits\NoticiaServiceTrait;

class NoticiaController extends Controller
{

    use NoticiaServiceTrait;

    protected $elasticParams = [];
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;

        $client = ClientBuilder::create()->setHosts(['elasticsearch:9200'])->build();
        
        $this->elasticParams['index'] = env('ES_INDEX');
        $this->elasticParams['type'] = 'noticias';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = $this->client->search(['index' => env('ES_INDEX'), 'type' => 'noticias']);
        die();
        return view('noticias/listaNoticias', compact('noticias'));
    }

    
    public function getNoticiasAPI()
    {
        return $this->getAllNewsTrait();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function recebeNoticiasAPI(Request $request)
    {
        $noticias = $request->all();
        
        return $this->registerNewsTrait($noticias);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
