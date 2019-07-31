<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\post;
use Faker\Generator as Faker;

$factory->define(App\post::class, function (Faker $faker) {
    return [
       'title' => $faker->sentence(),
	   'details' => (string) $faker->paragraph(), 
	   'created_at'=>$faker->date($format = 'Y-m-d', $max = 'now'),
	   'updated_at'=>$faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
