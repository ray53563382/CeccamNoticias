<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentsViewController extends Controller
{
    public function index($id){
        // $controller_id['id'] = $id;
        return view('pages.documentview')->with('id', $id);
    }

    public function pdfview($id){
        // $controller_id['id'] = $id;
        return view('pages.pdfview')->with('id', $id);
    }

    public function newview($id){
        // $controller_id['id'] = $id;
        return view('pages.newview')->with('id', $id);
    }

    public function actionview($id){
        // $controller_id['id'] = $id;
        return view('pages.actionview')->with('id', $id);
    }

    public function about(){
        // $controller_id['id'] = $id;
        return view('pages.about');
    }

    public function search($querystring){
        // $queryString['querystring'] = $querystring;
        return view('pages.searchview')->with('querystring', $querystring);
    }

    public function searchbyauthor($querystring, $author){
        // $queryString['querystring'] = $querystring;
        return view('pages.searchview', ['querystring' => $querystring, 'author' => $author ]);
        // return view('pages.searchview')->with('querystring', $querystring   );
        // return view('pages.searchview')->with('author', $author);
    }

    public function searchbytheme( $theme){
        return view( 'pages.searchview')->with('theme', $theme);
    }

    public function searchIn($typeofsearch,$querystring){
        // $queryString['querystring'] = $querystring;
        return view('pages.searchview', ['querystring' => $querystring, 'typeofsearch' => $typeofsearch ]);
    }
}
