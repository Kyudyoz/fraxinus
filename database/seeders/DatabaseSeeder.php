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
              'name'=> "Raihan Ghani",
              'phone'=> "6282320426161",
              'is_admin'=> false,
          ]);
        User::create ([
            
              'email'=> "iqbal@gmail.com",
              'password'=> bcrypt("12345"),
              'name'=> "Muhammad Iqbal Firdaus",
              'phone'=> "6282284928931",
              'is_admin'=> true,
          ]);
        User::create ([
            
              'email'=> "akhdan@gmail.com",
              'password'=> bcrypt("12345"),
              'name'=> "Akhdan Al Wafi",
              'phone'=> "6282320424343",
              'is_admin'=> false,
          ]);

          Product::create([
              'name'=> "Bunga Kembang Sepatu",
              'user_id'=>2,
              'price'=> '25000',
              'category'=> "Outdoors",
              'description'=>
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia voluptates repellendus ducimus maxime esse architecto nobis nulla, nostrum cupiditate aut voluptatem eveniet repudiandae totam dicta harum obcaecati commodi voluptatum, amet asperiores porro. Architecto eum veritatis consequatur, a, corporis obcaecati sed ex, accusamus alias voluptates nam nemo tempora maiores inventore explicabo!",
          ]);
          Product::create([
              'name'=> "Mawar",
              'user_id'=>2,
              'price'=> '15000',
              'category'=> "Indoors",
              'description'=>
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia voluptates repellendus ducimus maxime esse architecto nobis nulla, nostrum cupiditate aut voluptatem eveniet repudiandae totam dicta harum obcaecati commodi voluptatum, amet asperiores porro. Architecto eum veritatis consequatur, a, corporis obcaecati sed ex, accusamus alias voluptates nam nemo tempora maiores inventore explicabo!",
          ]);
          Product::create([
              'name'=> "Melati",
              'user_id'=>2,
              'price'=> '25000',
              'category'=> "Outdoors",
              'description'=>
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia voluptates repellendus ducimus maxime esse architecto nobis nulla, nostrum cupiditate aut voluptatem eveniet repudiandae totam dicta harum obcaecati commodi voluptatum, amet asperiores porro. Architecto eum veritatis consequatur, a, corporis obcaecati sed ex, accusamus alias voluptates nam nemo tempora maiores inventore explicabo!",
          ]);
          Product::create([
              'name'=> "Lily",
              'user_id'=>2,
              'price'=> '35000',
              'category'=> "Indoors",
              'description'=>
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia voluptates repellendus ducimus maxime esse architecto nobis nulla, nostrum cupiditate aut voluptatem eveniet repudiandae totam dicta harum obcaecati commodi voluptatum, amet asperiores porro. Architecto eum veritatis consequatur, a, corporis obcaecati sed ex, accusamus alias voluptates nam nemo tempora maiores inventore explicabo!",
          ]);
               
    }
}
