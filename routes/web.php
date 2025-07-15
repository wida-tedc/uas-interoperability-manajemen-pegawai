<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () {
    return 'API Pegawai aktif';
});

// Pegawai
$router->get('/pegawai', 'PegawaiController@index');
$router->get('/pegawai/{id}', 'PegawaiController@show');
$router->post('/pegawai', 'PegawaiController@store');
$router->put('/pegawai/{id}', 'PegawaiController@update');
$router->delete('/pegawai/{id}', 'PegawaiController@destroy');

// Jabatan
$router->get('/jabatan', 'JabatanController@index');
$router->get('/jabatan/{id}', 'JabatanController@show');
$router->post('/jabatan', 'JabatanController@store');
$router->put('/jabatan/{id}', 'JabatanController@update');
$router->delete('/jabatan/{id}', 'JabatanController@destroy');

// Bidang
$router->get('/bidang', 'BidangController@index');
$router->get('/bidang/{id}', 'BidangController@show');
$router->post('/bidang', 'BidangController@store');
$router->put('/bidang/{id}', 'BidangController@update');
$router->delete('/bidang/{id}', 'BidangController@destroy');

