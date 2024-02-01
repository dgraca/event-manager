<?php

namespace Database\Factories;

use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Entity;

class VenueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Venue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $entity = Entity::first();
        if (!$entity) {
            $entity = Entity::factory()->create();
        }

        return [
            'entity_id' => $this->faker->word,
            'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'slug' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'address' => $this->faker->text($this->faker->numberBetween(5, 512)),
            'location' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'country' => $this->faker->lexify('?????'),
            'postcode' => $this->faker->text($this->faker->numberBetween(5, 16)),
            'latitude' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'longitude' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'email' => $this->faker->email,
            'phone' => $this->faker->numerify('0##########'),
            'mobile' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
