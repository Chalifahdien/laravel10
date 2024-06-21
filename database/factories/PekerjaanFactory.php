<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Pengguna;
use App\Models\Pekerjaan;
use App\Models\StatusPekerjaan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pekerjaan>
 */
class PekerjaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pekerjaan::class;

    public function definition()
    {
        return [
            'id_pengguna' => User::where('id_peran', '!=', 1)->inRandomOrder()->first()->id_pengguna,
            'id_pengambil' => null,
            'judul' => $this->faker->sentence(),
            'deskripsi' => $this->faker->paragraph(),
            'kategori' => $this->faker->word(),
            'tenggat_waktu' => $this->faker->date(),
            'lampiran' => $this->faker->imageUrl(),
            'id_status' => StatusPekerjaan::inRandomOrder()->first()->id_status,
            'tanggal_dibuat' => now(),
            'tanggal_diperbarui' => now(),
        ];
    }
}
