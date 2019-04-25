<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Fala ae', function($bot){
    $bot->reply('Fala tu');
});
$botman->hears('Fala meu bom', function($bot){
    $bot->reply('Fala meu Padrinho');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');
