<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'text' => fake('pt_BR')->realTextBetween(3, 40),
            // 'reply_to' => null,
            'post_id' => Post::query()->inRandomOrder()->first()->uuid,
            'author' => User::query()->inRandomOrder()->first()->uuid
        ];
    }
}
