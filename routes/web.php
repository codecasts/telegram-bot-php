<?php

use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('set-webhook', function () {
    $url = 'https://api.telegram.org/bot'.env('TELEGRAM_BOT_TOKEN').'/setWebhook?url='.env('TELEGRAM_BOT_WEBHOOK');
    $client = new Client();
    $response = $client->get($url);
    return redirect()->route('webhook.info');
})->name('webhook.set');

Route::get('info-webhook', function () {
    $url = 'https://api.telegram.org/bot'.env('TELEGRAM_BOT_TOKEN').'/getWebhookInfo';
    $client = new Client();
    $response = $client->get($url);
    echo $response->getBody();
})->name('webhook.info');