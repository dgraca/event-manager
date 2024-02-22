<?php

namespace Database\Factories;

use App\Models\AccessTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\EventSessionTicket;
use App\Models\PaymentOption;
use App\Models\User;

class AccessTicketsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccessTicket::class;

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
            'event_session_ticket_id' => $this->faker->word,
            'user_id' => $this->faker->word,
            'payment_option_id' => $this->faker->word,
            'code' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'email' => $this->faker->email,
            'phone' => $this->faker->numerify('0##########'),
            'description' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'tickets_count' => $this->faker->word,
            'approved' => $this->faker->boolean,
            'status' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
