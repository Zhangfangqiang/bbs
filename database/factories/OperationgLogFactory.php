<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OperationgLog;
use Faker\Generator as Faker;

$factory->define(OperationgLog::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'uri' => $faker->text,
        'methods' => $faker->word,
        'data' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
