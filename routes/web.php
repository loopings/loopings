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


Route::get('/admin', function () {
     if(Auth::guest()){
        return Redirect::intended('/');
    }
 $search_comm=DB::table('comm_ddt38')->orderBy('nom_comm')->pluck('nom_comm','id');
 $search_epci=DB::table('epci_ddt38')->orderBy('nom_groupement')->pluck('nom_groupement','id');

    return view('index')
    ->with('search_comm',$search_comm)
    ->with('search_epci',$search_epci);
});

Route::get('testbs', 'TestBS@index');

Route::resource('users', 'Users');
Route::get('users/{id}/reset', 'Users@reset');

Route::resource('territoire', 'Territoires');

Route::resource('canton', 'Cantons');

Route::resource('agent_car', 'Agent_cars');

Route::resource('cham', 'Chams');

Route::resource('cads', 'Cadss');

Route::resource('scot', 'Scots');

Route::resource('epci', 'Epcis');

Route::resource('pnr', 'Pnrs');

Route::resource('ze', 'Zes');

Route::resource('dta', 'Dtas');

Route::resource('uu', 'Uus');

Route::resource('au', 'Aus');

Route::resource('cucs', 'Cucss');

Route::resource('comm', 'Comms');

Route::post('/comm/search','Comms@liste');


Route::resource('appb', 'Appbs');
Route::resource('reserve', 'Reserves');

Route::resource('icpe', 'Icpes');

Route::resource('maet', 'Maets');

Route::resource('natura2000', 'Natura2000s');

Route::resource('znieff', 'Znieffs');

Route::resource('zp', 'Zps');

Route::resource('cf', 'Cfs');

Route::resource('cm', 'Cms');

Route::resource('contactcm', 'Contactcms');

Route::resource('digue', 'Digues');

Route::resource('sage', 'Sages');

Route::resource('step', 'Steps');

Route::resource('cheau', 'Cheaus');

Route::resource('hydroelec', 'Hydroelecs');

Route::resource('conteco', 'Contecos');

Route::resource('contdigba', 'Contdigbas');

Route::resource('captage', 'Captages');

Route::resource('resstrat', 'Resstrats');

Route::resource('gemapi', 'Gemapis');

Route::resource('colcompeaup', 'Colcompeaups');

Route::resource('colgestass', 'Colgestasss');

Route::resource('colgesteaup', 'Colgesteaups');

Route::resource('colcompeauu', 'Colcompeauus');

Route::resource('troncons', 'Tronconss');

Route::resource('tepospepcv', 'Tepospepcvs');

Route::resource('pfre', 'Pfres');
Route::resource('aocaop', 'Aocaops');

Route::resource('population', 'Populations');

Route::resource('barrage', 'Barrages');


Route::resource('quartier', 'Quartiers');

Route::resource('zus', 'Zuss');

Route::resource('logement', 'Logements');

Route::resource('pasto', 'Pastos');
//logements commencés
Route::resource('logementc', 'Logementcs');

Route::resource('pcaet', 'Pcaets');

Route::resource('plui', 'Pluis');

Route::resource('agriculture', 'Agricultures');
Route::resource('lien', 'Liens');
Route::resource('lienG', 'LienGs');

//Association
//commune
Route::post('/assoc','Assocs@index');
Route::get('/assoc/create/{type_assoc}/{nomtable}/{typenom}/{nomid}/{id}','Assocs@create');

Route::post('/assoc/store','Assocs@store');


//epci
Route::post('/assoce','Assoces@index');

Route::get('/assoce/create/{type_assoc}/{nomtable}/{typenom}/{nomid}/{id}','Assoces@create');

Route::post('/assoce/store','Assoces@store');




//Routes pour la consultation
Route::get('/', 'Consultations@index');
Route::post('/commune', 'Consultations@voirComm');
Route::get('/commune/{id}', 'Consultations@voirCommGet');
Route::post('/epcicons', 'Consultations@voirEPCI');

//Routes temporaires
Route::get('testbs', 'TestBS@index');
Route::get('testbs/blank', 'TestBS@blank');
Route::get('testbs/buttons', 'TestBS@buttons');
Route::get('testbs/flot', 'TestBS@flot');
Route::get('testbs/forms', 'TestBS@forms');
Route::get('testbs/grid', 'TestBS@grid');
Route::get('testbs/icons', 'TestBS@icons');
Route::get('testbs/login', 'TestBS@login');
Route::get('testbs/morris', 'TestBS@morris');
Route::get('testbs/notifications', 'TestBS@notifications');
Route::get('testbs/panelswells', 'TestBS@panelswells');
Route::get('testbs/tables', 'TestBS@tables');
Route::get('testbs/typography', 'TestBS@typography');
Route::get('testbs/tableau', 'TestBS@tableau');
Route::get('testbs/creer', 'TestBS@creer');
Route::get('testbs/maj/{nom}/{prenom}/{username}/{groupe}', 'TestBS@maj');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
