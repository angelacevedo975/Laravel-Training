<?php

namespace Database\Factories;

use App\Models\My_User;
use Illuminate\Database\Eloquent\Factories\Factory;

class My_UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = My_User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'age' => $this->faker->numberBetween(15, 70),
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password(), 
        ];
    }
}
