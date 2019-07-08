<?php

use App\Producto;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'lote' => $faker->sentence(1),
        'producto' => $faker->sentence(3),
        'cantidad' => $faker->randomFloat($min = 1, $max = 1000),
        'fechaVencimiento' => Carbon::now(),
        'precio' => $faker->randomFloat($min = 1000, $max = 500000),
    ];
});
