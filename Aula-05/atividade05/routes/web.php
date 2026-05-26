<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    return 'Olá, Laravel!!!';
});

Route::get('/curso/ads', function () {
    return 'Curso de Análise e Desenvolvimeto de Sistemas';
});

Route::get('/curso/web', function () {
    return 'Disciplina de Programação Web I';
});

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/contato', function () {
    return view('contato');
});

Route::get('/institucional/missao', function () {
    return view('missao');
});


