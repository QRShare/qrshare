<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'slug' => Str::slug($this->faker->sentence),
            'is_active' => $this->faker->boolean,
            'user_id' => User::factory(),
            'date' => $this->faker->dateTime,
            'images' => $this->faker->randomElements([
                'image1.jpg', 'image2.jpg', 'image3.jpg',
            ], $count = 2),
        ];
    }
}
