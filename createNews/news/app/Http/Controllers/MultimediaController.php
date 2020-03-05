<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Multimedia;


class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $multimedia = Multimedia::all();            
           return $multimedia;
         }else{
             return view('pages/multimedia');
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
        $multi = new Multimedia();
        $multi->nombre = $request->nombre;
        $multi->tipo = $request->tipo;
        $multi->url = $request->url;
        $multi->save();
        return $multi;
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
        $multi = Multimedia::find($id);
        $multi->nombre = $request->nombre;
        $multi->tipo = $request->tipo;
        $multi->url = $request->url;
        $multi->save();
        return $multi;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota = Multimedia::find($id);
        $nota->delete();
    }
}
