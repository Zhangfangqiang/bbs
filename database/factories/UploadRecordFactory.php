<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UploadRecord;
use Faker\Generator as Faker;

$factory->define(UploadRecord::class, function (Faker $faker) {

    return [
        'md5' => $faker->word,
        'path' => $faker->word,
        'size' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
