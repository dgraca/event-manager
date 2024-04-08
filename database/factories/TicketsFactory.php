<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Event;
use App\Models\Zone;

class TicketsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $zone = Zone::first();
        if (!$zone) {
            $zone = Zone::factory()->create();
        }

        return [
            'event_id' => $this->faker->word,
            'zone_id' => $this->faker->word,
            'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'description' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'max_check_in' => $this->faker->word,
            'max_tickets_per_order' => $this->faker->word,
            'price' => $this->faker->numberBetween(0, 9223372036854775807),
            'currency' => $this->faker->lexify('?????'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
