<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $PostName = $this->faker->sentence;
        $slug = Str::slug($PostName, '-');

        return [
            'Post_name' => $PostName,
            'slug' => $slug,
            'description' => $this->faker->paragraph(1),
            'post_summary' => $this->faker->paragraph(2),
            'tags' => implode(',', $this->faker->words(3)),
            'post_body' => $this->faker->paragraph(5),
            'is_active' => 1,
        ];
    }



}
