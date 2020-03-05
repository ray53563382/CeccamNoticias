<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $document = Document::all();
            return $document;
          }else{
              return view('home');
         }
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
        $doc = new Document();
        $doc->fecha = $request->fecha;
        $doc->nombre = $request->nombre;
        $doc->importancia = $request->importancia;
        $doc->imgdesmostrativa = $request->imgdesmostrativa;
        $doc->pdf = $request->pdf;
        $doc->informacion = $request->informacion;
        $doc->descarga = $request->descarga;
        $doc->save();
        return $doc;
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
        $doc = Document::find($id);
        $doc->fecha = $request->fecha;
        $doc->nombre = $request->nombre;
        $doc->importancia = $request->importancia;
        $doc->imgdesmostrativa = $request->imgdesmostrativa;
        $doc->pdf = $request->pdf;
        $doc->informacion = $request->informacion;
        $doc->descarga = $request->descarga;
        $doc->save();
        return $doc;
    }
    
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = Document::find($id);
        $doc->delete();
    }

    public function todospdfs(){
        $todospds = Document::orderBy("fecha", "DESC")->paginate(9);
        return [
            'pagination' =>[
                'total'         => $todospds->total(),
                'current_page'  => $todospds->currentPage(),
                'per_page'      => $todospds->perPage(),
                'last_page'     => $todospds->lastPage(),
                'from'          => $todospds->firstItem(),
                'to'            => $todospds->lastPage()
            ],
            'pdfs'=> $todospds
        ];
    }
}
