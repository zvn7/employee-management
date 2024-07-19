<?php

namespace Database\Factories;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'birthdate' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'position' => $this->faker->jobTitle,
            'photo' => $this->faker->imageUrl(200, 200, 'people'),
            'province' => $this->faker->state,
            'city' => $this->faker->city,
            'district' => $this->faker->streetName,
            'subdistrict' => $this->faker->streetSuffix,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'notes' => $this->faker->paragraph(3),
        ];
    }
}
