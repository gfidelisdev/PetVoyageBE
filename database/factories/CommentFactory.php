<?php

namespace Database\Factories;

use App\Models\Comment;
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
    static function getRandomOrNull($probability_of_null, $callback)
    {
        $random_number = rand(1, 100);
        if ($random_number <= $probability_of_null) {
            return null;
        } else {
            return $callback();
        }
    }
    public function definition(): array
    {

        $post_id = Post::query()->inRandomOrder()->first()->uuid;
        $reply_to = self::getRandomOrNull(30, function () use ($post_id) {
            $comment = Comment::query()->where('post_id', $post_id)->inRandomOrder()->first();
            return $comment;
        });
        return [
            //
            'text' => fake('pt_BR')->realTextBetween(3, 40),
            'reply_to' => $reply_to,
            'post_id' => $post_id,
            'author' => User::query()->inRandomOrder()->first()->uuid
        ];
    }
}