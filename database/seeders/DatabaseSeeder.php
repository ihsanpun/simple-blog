<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ihsan Puntadewa',
            'username' => 'Natashhh',
            'email' => 'ihsanpuntadewa@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::factory(5)->create();
        Post::factory(20)->create();
        Category::create([
            'name' => 'programming',
            'slug' => 'programming'
        ]);
        Category::create([
            'name' => 'nature',
            'slug' => 'nature'
        ]);
        Category::create([
            'name' => 'personal',
            'slug' => 'personal'
        ]);
    }
}
