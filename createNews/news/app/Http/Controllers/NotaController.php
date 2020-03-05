<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->ajax()){
        //     $nota = Nota::all();
        //    return $nota;
        //  }else{
        //      return view('home');
        // }
        $most_recent = Nota::orderBy('fecha', 'DESC')->paginate(12);
        return [
            'pagination' =>[
                'total'         => $most_recent->total(),
                'current_page'  => $most_recent->currentPage(),
                'per_page'      => $most_recent->perPage(),
                'last_page'     => $most_recent->lastPage(),
                'from'          => $most_recent->firstItem(),
                'to'            => $most_recent->lastPage()
            ],
            'notas'=> $most_recent
        ];
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
        $nota = new Nota();
        $nota->titulo = $request->titulo;
        $nota->fecha = $request->fecha;
        $nota->autor = $request->autor;
        $nota->importancia = $request->importancia;
        $nota->idcategoria = $request->idcategoria;
        $nota->informacionArt = $request->informacionArt;
        $nota->imgdesmostrativa = $request->imgdesmostrativa;
        $nota->save();
        return $nota;
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
        $nota = Nota::find($id);
        $nota->titulo = $request->titulo;
        $nota->fecha = $request->fecha;
        $nota->autor = $request->autor;
        $nota->importancia = $request->importancia;
        $nota->idcategoria = $request->idcategoria;
        $nota->informacionArt = $request->informacionArt;
        $nota->imgdesmostrativa = $request->imgdesmostrativa;
        $nota->save();
        return $nota;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota = Nota::find($id);
        $nota->delete();
    }

}
