<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Menu;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $faker->seed(123);

        //ID menu terdiri dari 3 karakter pertama kategori menu yang di singkat bebas
        // dan 3 digit angka
        //Appetizer, Main Course, Dessert

        //Rekomendasi menunjukkan apakah rekomendasi dari chef atau bukan
        //harga menu tidak boleh kurang dari 0
        //ID order merupakan auto-increment
        // status order hanya terdiri dari 2 yaitu Selesai atau Menunggu Pembayaran
        //Quantity tidak boleh kurang dari 1
        for ($i = 0; $i < 5; $i++) {
            //regex(['[0-9]{3}'])

            Menu::create([
                'id' => $faker->unique()->regexify('[A]{1}[0]{2}[0-9]{1}'),
                'nama' => $faker->randomElement([
                    'Chicken', 'Bacon', 'Sausage', 'Strawberry', 'Orange',
                    'Pineapple', 'Cheese Pizza', 'Hamburger', 'Cheeseburger'
                ]),
                'rekomendasi' => $faker->numberBetween(0, 5),
                'harga' => $faker->numberBetween(32000, 110000),
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            Order::create([
                'id' => $faker->numberBetween(0, 5),
                'status' => $faker->randomElement(['Selesai', 'Menunggu Pembayaran']),
            ]);
        }
    }
}
