<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('layouts.app');
    return view('pages.home');

});

//Nuevs rutas
Route::post('/todaslaspublicaciones', 'publicacionController@todaslaspublicaciones');
Route::post('/buscapublicaciones', 'publicacionController@buscapublicaciones');
Route::post('/todaslasacciones', 'ActionsController@todaslasacciones');
Route::post('/publicacionesdelautor', 'publicacionController@publicacionesdelautor');
Route::post('/publicacionesportema','publicacionController@publicacionesportema');
Route::post('/publicacionesporpalabras','publicacionController@publicacionesporpalabras');
Route::post('/allnews', 'NoticiasController@allnews');
Route::post('/noticiasportema', 'NoticiasController@noticiasportema');
Route::post('/noticiasporpalabras', 'NoticiasController@noticiasporpalabras');
Route::post('/allAuthors', 'publicacionController@getAllAuthors');
Route::post('/todospdfs', 'DocumentController@todospdfs');



// HERE
Route::get('searchbytheme/{theme}','DocumentsViewController@searchbytheme');
Route::post('temaNoticias','NoticiasController@obtentema');
Route::post('temaPublicaciones','publicacionController@obtentema');



// Ruta para decidir el tipo de búsqueda.
Route::get('search/{typeofsearch}/{querystring}', 'DocumentsViewController@searchIn');
// Busqueda en Noticias
Route::post('buscaEnNoticias', 'NoticiasController@searchIn');
// Busqueda en Publicaciones
Route::post('buscaEnPublicaciones', 'publicacionController@searchIn');


Route::get('documentView/{id}', 'DocumentsViewController@index' );
Route::get('documentViewpdf/{id}', 'DocumentsViewController@pdfview' );
Route::get('actionView/{id}', 'DocumentsViewController@actionview' );
Route::get('newView/{id}', 'DocumentsViewController@newview' );



Route::get('search/{querystring}', 'DocumentsViewController@search');
// Route::get('search/{querystring}/{author}', 'DocumentsViewController@searchbyauthor');
Route::get('search/{querystring}/{author}', ['uses' => 'DocumentsViewController@searchbyauthor']);


Route::get('sobreNosotrosContacto','DocumentsViewController@about');


Route::post('/recentdata', 'publicacionController@recentdata');
// Route::post('/allnews', 'publicacionController@allnews');


Route::post('/relevant', 'publicacionController@relevant');
Route::post('/getSuperRelevantes', 'publicacionController@masrelevante');
Route::post('/recent', 'publicacionController@recent');
Route::post('/getNewsHome', 'publicacionController@getNewsHome');
Route::post('/updateNews', 'NoticiasController@update');
Route::post('/deleteNew', 'NoticiasController@destroy');

Route::post('/getDocument', 'publicacionController@getdoc');
Route::post('/getsearch', 'publicacionController@getsearch');
// Route::post('/allfromAuthor', 'publicacionController@getAllFromAuthor');
Route::post('/allrecent', 'publicacionController@allrecent');
Route::post('/getpdf', 'publicacionController@getpdf');
Route::post('/gettheme', 'publicacionController@getheme');
Route::post('/colocarImportante', 'publicacionController@colocarImportante');
Route::post('/removerImportante', 'publicacionController@removerImportante');
Route::post('/colocarSuperImportante', 'publicacionController@colocarSuperImportante');

// Acciones
Route::post('/actionRegister', 'ActionsController@store');
// Route::post('/getAllActions', 'ActionsController@index');
Route::post('/getAction', 'ActionsController@show');
Route::post('/updateAction', 'ActionsController@update');
Route::post('/deleteAction', 'ActionsController@destroy');

Route::post('/getNew', 'NoticiasController@getNew');


// Route::post('/fetchAllDocs', 'publicacionController@fetchAllDocs');

Route::post('/popularPost', 'publicacionController@popularPost');
Route::post('/popularPostMedium', 'publicacionController@popularPostMedium');

Route::post('/download/{id}', 'publicacionController@download');
Route::get('/registerClose', 'publicacionController@cerrar');

Route::post('/saveEmail', 'EmailController@store');

Route::resource('/categorias', 'CategoriaController');
Route::resource('/multimedia', 'MultimediaController');



Auth::routes();

Route::resource('/notas', 'NotaController')->middleware('auth');
Route::resource('/guardarNoticia', 'NoticiasController')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/document', 'DocumentController')->middleware('auth');










