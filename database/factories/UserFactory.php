<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'email_verified_at' => $faker->date('Y-m-d H:i:s'),
        'avatar' => $faker->word,
        'introduction' => $faker->word,
        'password' => $faker->word,
        'remember_token' => $faker->word,
        'notification_count' => $faker->word,
        'be_follow_count' => $faker->word,
        'follow_count' => $faker->word,
        'be_awesome_count' => $faker->word,
        'awesome_count' => $faker->word,
        'be_favorite_count' => $faker->word,
        'favorite_count' => $faker->word,
        'last_login_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
