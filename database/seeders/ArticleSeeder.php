<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Random articles
        Article::factory()->count(5)->create();

        // Random deleted articles
        Article::factory()->count(2)->deleted()->create();

    }
}
