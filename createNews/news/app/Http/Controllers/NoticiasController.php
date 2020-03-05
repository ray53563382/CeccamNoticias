<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Noticia;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $noticia = Noticia::all();
           return $nota;
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
    public function store(Request $request){
        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->fecha = $request->fecha;
        $noticia->autor = $request->autor;
        $noticia->importancia = $request->importancia;
        $noticia->idcategoria = $request->idcategoria;
        $noticia->informacionArt = $request->informacionArt;
        $noticia->imgdesmostrativa = $request->imgdesmostrativa;
        $noticia->save();
        return $noticia;
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
    public function update(Request $request)
    {
        $noticia = Noticia::find($request->id);
        $noticia->titulo = $request->titulo;
        $noticia->fecha = $request->fecha;
        $noticia->autor = $request->autor;
        $noticia->importancia = $request->importancia;
        $noticia->idcategoria = $request->idcategoria;
        $noticia->informacionArt = $request->informacionArt;
        $noticia->imgdesmostrativa = $request->imgdesmostrativa;
        $noticia->save();
        return $noticia;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $noticia = Noticia::find($request->id);
        $noticia->delete();
    }

    public function getNew(Request $request)
    {
        $noticia = Noticia::find($request->id);
        return $noticia;
    }

    public function allnews(Request $request)
    {   
        $news = Noticia::orderBy('fecha', 'DESC')->paginate(9);
        return [
            'pagination' =>[
                'total'         => $news->total(),
                'current_page'  => $news->currentPage(),
                'per_page'      => $news->perPage(),
                'last_page'     => $news->lastPage(),
                'from'          => $news->firstItem(),
                'to'            => $news->lastPage()
            ],
            'noticias'=> $news
        ]; 
    }

    public function searchIn(Request $request){
      
       $searchValues = preg_split('/\s+/', $request->busqueda, -1, PREG_SPLIT_NO_EMPTY); 
       $matches = Noticia::where(function ($q) use ($searchValues) {
       foreach ($searchValues as $value) {
           $q->orWhere('titulo', 'like', "%{$value}%");
       }
       })->paginate(9);

       return [
        'pagination' =>[
            'total'         => $matches->total(),
            'current_page'  => $matches->currentPage(),
            'per_page'      => $matches->perPage(),
            'last_page'     => $matches->lastPage(),
            'from'          => $matches->firstItem(),
            'to'            => $matches->lastPage()
        ],
        'noticias'=> $matches
    ];

       
   }

   public function obtentema(Request $request){
      
    $temas = Noticia::where('idcategoria', '=', $request->tema)->paginate(9);

    return [
        'paginationNoticias' =>[
            'total'         => $temas->total(),
            'current_page'  => $temas->currentPage(),
            'per_page'      => $temas->perPage(),
            'last_page'     => $temas->lastPage(),
            'from'          => $temas->firstItem(),
            'to'            => $temas->lastPage()
        ],
        'noticias'=> $temas
    ];
    
    }

    public function noticiasportema(Request $request){
        $noticiasportema = Noticia::where('idcategoria', '=', $request->tema)->paginate(9);

        return [
            'pagination' =>[
                'total'         => $noticiasportema->total(),
                'current_page'  => $noticiasportema->currentPage(),
                'per_page'      => $noticiasportema->perPage(),
                'last_page'     => $noticiasportema->lastPage(),
                'from'          => $noticiasportema->firstItem(),
                'to'            => $noticiasportema->lastPage()
            ],
            'noticias'=> $noticiasportema
        ];
    }

    public function noticiasporpalabras(Request $request){
        $searchValues = preg_split('/\s+/', $request->tema, -1, PREG_SPLIT_NO_EMPTY); 
        $noticiasporpalabras = Noticia::where(function ($q) use ($searchValues) {
        foreach ($searchValues as $value) {
            $q->orWhere('titulo', 'like', "%{$value}%")->orwhere('autor', 'like', "%{$value}%");
        }
        })->paginate(9);
 
        return [
         'pagination' =>[
             'total'         => $noticiasporpalabras->total(),
             'current_page'  => $noticiasporpalabras->currentPage(),
             'per_page'      => $noticiasporpalabras->perPage(),
             'last_page'     => $noticiasporpalabras->lastPage(),
             'from'          => $noticiasporpalabras->firstItem(),
             'to'            => $noticiasporpalabras->lastPage()
         ],
         'noticias'=> $noticiasporpalabras
     ];
    }



}
