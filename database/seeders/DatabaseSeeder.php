<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Users
        DB::table('users')->insert([
            'name' => 'Moose',
            'email' => 'moose@gmail.com',
            'password' => Hash::make('123'),
            'role' => 10,
        ]);
        
        DB::table('users')->insert([
            'name' => 'Beaver',
            'email' => 'beaver@gmail.com',
            'password' => Hash::make('123'),
        ]);

        //Establishments
        DB::table('establishments')->insert([
            'title' => 'That Soup Place',
            'code' => 111,
            'address' => 'Probably somewhere',
        ]);
        
        DB::table('establishments')->insert([
            'title' => 'That Pasta Place',
            'code' => 112,
            'address' => 'Most likely somewhere',
        ]);

        //Menus
        DB::table('menus')->insert([
            'title' => 'Soups',
        ]);

        DB::table('menus')->insert([
            'title' => 'Pastas',
        ]);
        

        //Meals
        DB::table('meals')->insert([
            'title' => 'Soup with bits',
            'description' => 'Soup that has bits in it',
        ]);

        DB::table('meals')->insert([
            'title' => 'Soup without bits',
            'description' => 'Soup that does not have bits in it',
        ]);

        DB::table('meals')->insert([
            'title' => 'Spicy soup',
            'description' => 'Soup that is spicy',
        ]);
        
        DB::table('meals')->insert([
            'title' => 'Long noodles',
            'description' => 'Noodles that are long, also known as spagoot',
        ]);

        DB::table('meals')->insert([
            'title' => 'Short noodles',
            'description' => 'Noodles that are short. Probably would not count as spaghetti',
        ]);

        DB::table('meals')->insert([
            'title' => 'Spinny noodles',
            'description' => 'Noodles that are spinny. These look fun. Order them!',
        ]);
    }
}
