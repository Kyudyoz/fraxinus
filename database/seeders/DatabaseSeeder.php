<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create ([

              'email'=> "raihan@gmail.com",
              'password'=> bcrypt("12345"),
              'name'=> "Raihan Ghani Perangin-angin",
              'phone'=> "6282320426161",
              'address'=> "Simpang Rimbo",
              'is_admin'=> false,
          ]);
        User::create ([

              'email'=> "iqbal@gmail.com",
              'password'=> bcrypt("12345"),
              'name'=> "Muhammad Iqbal Firdaus",
              'phone'=> "6282284928931",
              'address'=> "Mendalo",
              'is_admin'=> false,
          ]);
        User::create ([

              'email'=> "akhdan@gmail.com",
              'password'=> bcrypt("12345"),
              'name'=> "Akhdan Al Wafi",
              'phone'=> "6282320424343",
              'address'=> "Muara Bulian",
              'is_admin'=> false,
          ]);

        User::create ([

              'email'=> "arif@gmail.com",
              'password'=> bcrypt("12345"),
              'name'=> "Muhammad Arif Firdaus",
              'phone'=> "6282320424223",
              'address'=> "Muara Bungo",
              'is_admin'=> false,
          ]);
        User::create ([

              'email'=> "sabrian@gmail.com",
              'password'=> bcrypt("12345"),
              'name'=> "Sabrian Maulana",
              'phone'=> "6282320424123",
              'address'=> "Jambi",
              'is_admin'=> false,
          ]);
        User::create ([

              'email'=> "admin@gmail.com",
              'password'=> bcrypt("12345"),
              'name'=> "Administrator",
              'phone'=> "628232042123",
              'address'=> "Jambi",
              'is_admin'=> true,
          ]);

        //   Product::create([
        //       'name'=> "Bunga Kembang Sepatu",
        //       'user_id'=>2,
        //       'price'=> '25000',
        //       'qty'=> 1,
        //       'category'=> "Outdoors",
        //       'description'=>
        //         "Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia voluptates repellendus ducimus maxime esse architecto nobis nulla, nostrum cupiditate aut voluptatem eveniet repudiandae totam dicta harum obcaecati commodi voluptatum, amet asperiores porro. Architecto eum veritatis consequatur, a, corporis obcaecati sed ex, accusamus alias voluptates nam nemo tempora maiores inventore explicabo!",
        //   ]);
    }
}
