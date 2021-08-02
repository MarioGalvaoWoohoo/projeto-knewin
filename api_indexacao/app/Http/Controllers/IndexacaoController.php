<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\NoticiaServiceTrait;
use Illuminate\Support\Facades\Http;

class IndexacaoController extends Controller
{

    use NoticiaServiceTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('indexacao/form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'arquivo' => 'required'
        ]);

        $arquivo = $request->file("arquivo"); 
        
        $json_file = file_get_contents($arquivo);
        $dados = $this->verificaJsonTrait($json_file);
        $json_verificado = $dados->getOriginalContent();
                
        if($json_verificado['status']){
            
            $dados_tratados = $this->verificaCamposNoticiasTrait($json_verificado['noticias']); 
            $response = $this->importaNoticiasApiTrait($dados_tratados); 
            
            return redirect()
                    ->back()
                    ->with('errors', $response['msg']);

        }else{
            return redirect()
                    ->back()
                    ->with('errors', $json_verificado['error_json']);
        }

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
