<?php

namespace Database\Factories;

use App\Models\EventSessions;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Event;

class EventSessionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventSessions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $event = Event::first();
        if (!$event) {
            $event = Event::factory()->create();
        }

        return [
            'event_id' => $this->faker->word,
            'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'slug' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'description' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'max_capacity' => $this->faker->word,
            'start_date' => $this->faker->date('Y-m-d H:i:s'),
            'end_date' => $this->faker->date('Y-m-d H:i:s'),
            'rrule' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'type' => $this->faker->word,
            'status' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
