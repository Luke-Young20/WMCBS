<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'booking_title' => $this->faker->numberBetween($min = 1, $max = 24),
            'time_slot' => $this->faker->numberBetween($min = 1, $max = 24),
            'user_id' => $this->faker->numberBetween($min = 1, $max = User::all()->count()),
            'room_number' => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}
