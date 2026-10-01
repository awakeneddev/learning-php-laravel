<?php

namespace Database\Factories;

use App\Enums\ContactStatus;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            // unique() guarantees no duplicate phone numbers are generated
            'phone' => $this->faker->unique()->numerify('##########'),
            // safeEmail generates valid, fake email layouts
            'email' => $this->faker->safeEmail(),
            // 'status' will automatically default to 'invalid' based on your migration,
            // but you can explicitly override it here if you like:
            'status' => fake()->randomElement(ContactStatus::cases()),

        ];
    }
}
