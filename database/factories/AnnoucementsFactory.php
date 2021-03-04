<?php

namespace Database\Factories;

use App\Models\Annoucements;
use Illuminate\Database\Eloquent\Factories\Factory;


class AnnoucementsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Annoucements::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
            'content' => $this->faker->text($maxNBChars = 200),
            'price' => $this->faker->numberBetween(0, 1000),
            'enabled' => true,
        ];
    }
}
