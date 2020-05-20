<?php

use App\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = [
            'Martha\'s Florería',
            'Florería Amore',
            'Florería Disflor'
        ];

        foreach ($shops as $shopName) {
            factory(Shop::class)
                ->create([
                    'name' => $shopName,
                    'email' => Str::slug($shopName) . '@example.com'
                ]);
        }
    }
}
