<?php

namespace Database\Factories;

use App\Models\PaymentOptions;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Entity;

class PaymentOptionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentOptions::class;

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
            'business_entity_name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'vat' => $this->faker->text($this->faker->numberBetween(5, 32)),
            'address' => $this->faker->text($this->faker->numberBetween(5, 512)),
            'location' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'country' => $this->faker->lexify('?????'),
            'postcode' => $this->faker->text($this->faker->numberBetween(5, 16)),
            'email' => $this->faker->email,
            'data' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'currency' => $this->faker->lexify('?????'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
