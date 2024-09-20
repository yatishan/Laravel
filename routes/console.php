<?php

use App\Services\PostService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('greet {name}',function($name){
    $this->info('hello world'." ".$name);
});

Artisan::command('post:get {id}', function ($id) {
    $post = new PostService();
    $json = $post->getPost($id);
    var_dump($json);
});