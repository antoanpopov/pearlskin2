<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
/** @var Router $router */

if (App::getLocale('bg')) {
    $router->get('доктори/{slug}', [
        'as' => 'doctor',
        'uses' => 'DoctorController@get',
    ]);
    $router->get('процедури/{slug}', [
        'as' => 'procedure',
        'uses' => 'ProcedureController@get',
    ]);
    $router->get('новини/{slug}', [
        'as' => 'news',
        'uses' => 'ArticleController@article',
    ]);
}
if (App::getLocale('en')) {
    $router->get('doctors/{slug}', [
        'as' => 'doctor',
        'uses' => 'DoctorController@get',
    ]);
    $router->get('procedures/{slug}', [
        'as' => 'procedure',
        'uses' => 'ProcedureController@get',
    ]);
    $router->get('news/{slug}', [
        'as' => 'news',
        'uses' => 'ArticleController@article',
    ]);
}

$router->post('contact/ask-question', [
    'as' => 'contact_us.ask_question',
    'uses' => 'Frontend\EmailController@askQuestion',
]);
