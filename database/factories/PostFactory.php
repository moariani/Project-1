<?php

namespace Database\Factories;

use App\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    // Determine The Model For The Factory
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Post Category Array
        $category = ['Health' , 'Cooking'] ;
        return [
            'title' => $this->faker->realText(50) ,
            'body' => $this->faker->realText(255) ,
            'category' => $category[rand(0,1)] ,
        ];
    }
}
