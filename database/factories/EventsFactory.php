<?php

namespace Database\Factories;

use App\Models\Events;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Events::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_id' => 1,
            'event_name' => $this->faker->sentence(),
            'event_host' => $this->faker->randomDigit(),
            'event_location' => $this->faker->address,
            'event_date' => $this->faker->dateTimeThisYear(),
            'event_description' => $this->faker->sentences(3, true),
            'event_key' => null,
            'created_at' => $this->faker->dateTimeThisYear(),
            'updated_at' => $this->faker->dateTimeThisYear(),
        ];
        // return [
        //
        // ];
    }
}
