<?php

namespace Database\Factories;

use App\Models\Comments;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Fakecar;


class CommentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->text($maxNBChars = 50),
            'annoucement_id' => $this->faker->numberBetween(0, 9),
            'user_id' => $this->faker->numberBetween(0, 9),
            'enabled' => true,
        ];
    }
}
