<?php

namespace App\Http\Controllers;

use Elasticsearch\Client;
use Illuminate\Http\Request;
use App\Traits\NoticiaServiceTrait;

class NoticiaController extends Controller
{

    use NoticiaServiceTrait;

    public function getNoticiasAPI()
    {
        return Response($this->getAllNewsTrait());
    }

    public function getNoticiasAll()
    {
        $noticias = $this->getAllNewsTrait();

        return view('noticias/listaNoticias', ['noticias' => $noticias]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registraNoticiasAPI(Request $request)
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
