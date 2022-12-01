<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() { // 100 inserts en las tablas

        User::factory(100)->create();
        Category::factory(100)->create();   // primero "category" porque sino 
        Product::factory(100)->create();    // la foreign key da error

    }

}