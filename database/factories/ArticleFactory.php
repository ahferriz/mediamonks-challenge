<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'author' => fake()->name(),
            'subtitle' => fake()->sentences(2, true),
            'content' => fake()->paragraphs(3, true),
            'created_at' => fake()->dateTimeBetween('-2 months', 'now'),
        ];
    }

    /**
     * Deleted article.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function deleted()
    {
        return $this->state(function (array $attributes) {
            return [
                'deleted_at' => Carbon::now(),
            ];
        });
    }


}
