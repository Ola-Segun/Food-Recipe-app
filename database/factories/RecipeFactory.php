<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $recipeName = $this->faker->sentence;
        $slug = Str::slug($recipeName, '-');

        return [
            'recipe_name' => $recipeName,
            'slug' => $slug,
            'description' => $this->faker->paragraph,
            'small_details' => $this->faker->paragraph(2),
            'avg_cooking_time' => $this->faker->numberBetween(10, 120) . ' minutes',
            'ingredients' => implode(', ', $this->faker->words(5)),
            'tools_needed' => implode(', ', $this->faker->words(3)),
            'procedures' => $this->generateNumberedSentences(5),
            'is_active' => 1,
        ];
    }


        /**
     * Generate numbered sentences.
     *
     * @param int $count
     * @return string
     */
    private function generateNumberedSentences($count)
    {
        $procedures = [];
        for ($i = 1; $i <= $count; $i++) {
            $procedures[] = $i . '. ' . $this->faker->sentence();
        }
        return implode(', ', $procedures);
    }
}
