<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'score' => 0,
            'wallet' => 15000,
            'role' => 'customer',
            'enabled' => $this->faker->boolean(80),
        ];
    }

    /**
     * Indique que l'utilisateur est admin
     */
    public function admin(): UserFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'admin',
                'enabled' => true,
            ];
        });
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $user->update([
                'score' => $user->vehicles->count(),
                'wallet' => $user->wallet - $user->vehicles->sum('price'),
            ]);
        });
    }
}
