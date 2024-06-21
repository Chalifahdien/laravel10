<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telepon' => $this->faker->phoneNumber(),
            'password' => bcrypt('password'),
            'foto_profil' => $this->faker->imageUrl(),
            'id_peran' => 2,
            'tanggal_dibuat' => now(),
        ];
    }

    public function admin(){
        return $this->state(fn (array $attributes) => [
            'nama_lengkap' => 'admin1',
            'email' => 'admin1@gmail.com',
            'telepon' => $this->faker->phoneNumber(),
            'password' => bcrypt('password'),
            'foto_profil' => $this->faker->imageUrl(),
            'id_peran' => 1,
            'tanggal_dibuat' => now(),
        ]);
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
