<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
$name = $faker->name;
$lastname = $faker->lastname;
$fullname=$name +" "+$lastname;


    return [
        'name' => $faker->name,
        'lastname'=> $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'slug'=> str_slug($fullname),
		'gender'=> 0,
		'avatar' => 'public/default/avatars/female.png',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
