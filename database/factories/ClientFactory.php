<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_name'=>$this->faker->name(),
            'contact_phone'=>$this->faker->phoneNumber(),
            'contact_email'=>$this->faker->companyEmail(),
            'inverter_size' => Str::random(10),
            'client_location' => $this->faker->city(),
            'client_status' => Str::random(10)

        ];
    }
}
