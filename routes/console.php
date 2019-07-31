<?php

use Illuminate\Foundation\Inspiring;
use App\post;

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
})->describe('Display an inspiring quote');


Artisan::command('at:test', function () {
    $var1 = $this->ask('Enter Variable 1');
    $var2 = $this->ask('Enter Variable 2');
    $variable = $var1+$var2;
    $this->comment($variable);
   // $this->comment(Inspiring::quote());
})->describe('This Is a Test Command');
Artisan::command('show:pd', function () {
    $var1 = $this->ask('Enter post id');
    $post = post::find($var1)->first();
    $this->comment($post);
   // $this->comment(Inspiring::quote());
})->describe('This Is a Test Command');