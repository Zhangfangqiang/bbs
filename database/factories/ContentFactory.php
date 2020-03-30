<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'parent_id' => $faker->word,
        'is_release' => $faker->word,
        'is_comment' => $faker->word,
        'is_top' => $faker->word,
        'is_recommended' => $faker->word,
        'type' => $faker->word,
        'watch_count' => $faker->word,
        'favorite_count' => $faker->word,
        'awesome_count' => $faker->word,
        'comment_count' => $faker->word,
        'title' => $faker->word,
        'english_title' => $faker->word,
        'seo_key' => $faker->word,
        'excerpt' => $faker->word,
        'source' => $faker->word,
        'content' => $faker->text,
        'video' => $faker->text,
        'img' => $faker->word,
        'more' => $faker->text,
        'release_at' => $faker->date('Y-m-d H:i:s'),
        'delete_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
