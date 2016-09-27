<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('site.home');
});

Route::auth();

Route::get('/home', 'HomeController@index');
//ROTAS DAS PROPOSTAS
Route::get('ver-proposta',  	'ProposalController@check_proposal');
Route::get('fazer-proposta',	'ProposalController@create');
Route::get('nova-proposta/{id}/tipo/{type}','ProposalController@new_proposal');
Route::post('update',			'ProposalController@update');
Route::get('index',			'ProposalController@index');
Route::post('primeira',			'ProposalController@primeira');
Route::get('proposta-concluida','ProposalController@concluded');
Route::post('upload-files','ProposalController@upload_files');
Route::post('destroy','ProposalController@destroy');
Route::get('email-inquilino-pf','ProposalController@proponente_pf');
//CADASTRO DE FIADOR DE FORMA AVULSA
Route::get('novo-fiador' , 'ProposalController@new_guarantor');
//CADASTRO DE FIADOR PELO EMAIL (PROPONENTE)
Route::get('cadastrar-fiador/{id}' , 'ProposalController@registering_guarantor');
Route::post('update-fiador','ProposalController@guarantor_update');


Route::group(['prefix' => 'pj'], function () {
    Route::post('update','LegalController@update');
    Route::post('upload','LegalController@upload');
    Route::get('sucesso-proposta/{pj}/email/{email}' , 'LegalController@message');
});

//ROTA DE MENSAGEM

// Route::get('email-user', function () {
//     return view('email.proposal_id_user');
// });
Route::group(['middleware' => ['web']], function () {

});
