<?php

namespace Database\Factories;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pembeli;

class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;

    public function definition(): array
    {
        $pembeli = Pembeli::factory()->create();

        return [
            'pembeli_id' => $pembeli->id,
            'nama_pembeli' => $pembeli->nama,
            'kode_transaksi' => strtoupper($this->faker->bothify('TRX###??')),
            'tanggal_transaksi' => $this->faker->date(),
            'jumlah_barang' => $this->faker->numberBetween(1, 10),
            'total_harga' => $this->faker->randomFloat(2, 10000, 1000000),
        ];
    }
}