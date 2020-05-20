<?php

/** @var Factory $factory */

use App\Shop;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->unique()->companyEmail,
        'address' => $faker->address,
        'branches' => $faker->numberBetween(1, 20),
        'owner_id' => factory(User::class)
    ];
});

$factory->afterCreating(Shop::class, function (Shop $shop, Faker $faker) {
    $products = [
        [
            'name' => 'Caja de Rosas',
            'image' => 'https://images.unsplash.com/photo-1579231513393-d2fcec1c71ad?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&crop=entropy',
            'min' => 17500,
            'max' => 25000
        ],
        [
            'name' => 'Ramo de Rosas',
            'image' => 'https://images.unsplash.com/photo-1565957949991-2f295d814345?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&crop=entropy',
            'min' => 10000,
            'max' => 12000
        ],
        [
            'name' => 'Bolsa de Flores Mixtas',
            'image' => 'https://images.unsplash.com/photo-1552034507-dc5d8099e659?ixlib=rb-1.2.1&crop=entropy',
            'min' => 25000,
            'max' => 30000
        ],
        [
            'name' => 'Ramo de Flores Mixtas',
            'image' => 'https://images.unsplash.com/photo-1569182146804-2a05f7021422?ixlib=rb-1.2.1&crop=entropy',
            'min' => 10000,
            'max' => 15000
        ],
        [
            'name' => 'Ramo de Margaritas',
            'image' => 'https://images.unsplash.com/photo-1559533914-a0849c51e503?ixlib=rb-1.2.1&crop=entropy',
            'min' => 11500,
            'max' => 13000
        ],
        [
            'name' => 'Ramo de Rosas Blancas',
            'image' => 'https://images.unsplash.com/photo-1582113652202-9eba49eafe96?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9',
            'min' => 11500,
            'max' => 13000
        ],
        [
            'name' => 'Maceta de Flores de Colores',
            'image' => 'https://images.unsplash.com/photo-1580656256891-87365fb28938?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9',
            'min' => 27500,
            'max' => 32000
        ]
    ];

    foreach ($products as $selected) {
        $shop->products()->create([
            'name' => $selected['name'],
            'image' => $selected['image'] . '&auto=format&fit=crop&w=640&h=640',
            'price' => random_int($selected['min'], $selected['max'])
        ]);
    }
});
