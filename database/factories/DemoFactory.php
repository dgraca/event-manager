<?php

namespace Database\Factories;

use App\Models\Demo;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class DemoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Demo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'demo_id' => $this->faker->word,
            'user_id' => $this->faker->word,
            'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'body' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'phone' => $this->faker->numerify('0##########'),
            'vat' => $this->faker->text($this->faker->numberBetween(5, 32)),
            'zip' => $this->faker->text($this->faker->numberBetween(5, 16)),
            'optional' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'body_optional' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'value' => $this->faker->numberBetween(0, 9223372036854775807),
            'date' => $this->faker->date('Y-m-d'),
            'datetime' => $this->faker->date('Y-m-d H:i:s'),
            'checkbox' => $this->faker->boolean,
            'privacy_policy' => $this->faker->boolean,
            'status' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
