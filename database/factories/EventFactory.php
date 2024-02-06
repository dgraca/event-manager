<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Entity;
use App\Models\Venue;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $venue = Venue::first();
        if (!$venue) {
            $venue = Venue::factory()->create();
        }

        return [
            'entity_id' => $this->faker->word,
            'venue_id' => $this->faker->word,
            'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'slug' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'description' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'scheduled_start' => $this->faker->date('Y-m-d H:i:s'),
            'scheduled_end' => $this->faker->date('Y-m-d H:i:s'),
            'start_date' => $this->faker->date('Y-m-d H:i:s'),
            'end_date' => $this->faker->date('Y-m-d H:i:s'),
            'registration_note' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'pre-approval' => $this->faker->boolean,
            'max_capacity' => $this->faker->word,
            'type' => $this->faker->word,
            'status' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
