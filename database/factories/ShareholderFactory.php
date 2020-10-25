<?php

namespace Database\Factories;

use App\Models\Shareholder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Supports\Hash;

class ShareholderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shareholder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->name,
            'lastname' => $this->fake->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
        ];
    }
}
