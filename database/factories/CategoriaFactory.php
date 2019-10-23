<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\Categoria;
use Faker\Generator as Faker;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->text
    ];
});
