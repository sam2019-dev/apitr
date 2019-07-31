<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\comment;
use Faker\Generator as Faker;

$factory->define(App\comment::class, function (Faker $faker) {
    return [
        'post_id' => rand(1,15),
		'comment' => (string) $faker->paragraph(),
		'created_at'=>$faker->date($format = 'Y-m-d', $max = 'now'),
	    'updated_at'=>$faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
