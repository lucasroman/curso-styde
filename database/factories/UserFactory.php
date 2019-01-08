<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    // Fighters have 78 members
    $fighters = [
        'Johnny Cage',
        'Kano',
        'Liu Kang',
        'Raiden',
        'Scorpion',
        'Sonya Blade',
        'Sub-Zero',
        'Goro',
        'Shang Tsung',
        'Reptile',
        'Baraka',
        'Jade',
        'Jackson "J" Briggs',
        'Kintaro',
        'Kitana',
        'Kung Lao',
        'Mileena',
        'Noob Saibot',
        'Shao Kahn',
        'Smoke',
        'Chameleon',
        'Cyrax',
        'Ermac',
        'Kabal',
        'Khameleon',
        'Motaro',
        'Nightwolf',
        'Rain',
        'Sektor',
        'Sheeva',
        'Sindel',
        'Stryker',
        'Fujin',
        'Quan Chi',
        'Sareena',
        'Shinnok',
        'Jarek',
        'Kai',
        'Meat',
        'Reiko',
        'Tanya',
        'Tremor',
        'Blaze',
        "Bo' Rai Cho",
        'Drahmin',
        'Frost',
        'Hsu Hao',
        'Kenshi',
        'Li Mei',
        'Mavado',
        'Mokap',
        'Moloch',
        'Nitara',
        'Ashrah',
        'Dairou',
        'Darrius',
        'Havik',
        'Hotaru',
        'Kira',
        'Kobra',
        'Onaga',
        'Shujinko',
        'Daegon',
        'Taven',
        'Dark Kahn',
        'Skarlet',
        'Cassie Cage',
        "D'Vorah",
        'Erron Black',
        'Ferra / Torr',
        'Jacqui Briggs',
        'Kotal Kahn',
        'Kung Jin',
        'Takeda Takahashi',
        'Triborg',
        'Belokk',
        'Hornbuckle',
        'Nimbus Terrafaux',
    ];

    return [
        'name' => $faker->unique()->randomElement($fighters),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'profession_id' => $faker->randomElement([1, 2, 3, 4]),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
