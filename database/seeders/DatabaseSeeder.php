<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Baraka Admin',
            'email' => 'info@admin.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
        /** @var Page $page */
        $page = Page::create([
            'title' =>"Home PAGE",
            'meta_title' => "Affordable plots for sale",
            'meta_description' => "Affordable land",
            'is_published' => true,
            'is_front_page' => true,
        ]);

        $page->link()->create([
            'slug' => str($page->title)->slug('-')->value(),
            'type' => 'page',
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
