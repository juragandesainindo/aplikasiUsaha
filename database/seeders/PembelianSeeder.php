<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // for ($i = 1; $i <= 5; $i++) {
        //     $faker = Faker::create('id_ID');

        DB::table('pembelians')->insert([
            'id'            => '2',
            'nama_supplier' => 'Faisal',
            'nama_barang' => null,
            'harga_super'    => '3000',
            'tonase_super'    => '250',
            'harga_bulat'    => '3000',
            'tonase_bulat'    => '143',
            'harga_sortiran'    => '2500',
            'tonase_sortiran'    => '180',
            'total_super'    => '750000',
            'total_bulat'    => '429000',
            'total_sortiran'    => '450000',
            'total_biaya_beli'    => '1629000',
            'total_tonase_beli'    => '573',
            'periode_id'  => '2',
            'datausaha_id'  => '1',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);
        DB::table('pembelians')->insert([
            'id'            => '3',
            'nama_supplier' => 'Junaidi',
            'nama_barang' => null,
            'harga_super'    => '3000',
            'tonase_super'    => '250',
            'harga_bulat'    => '3000',
            'tonase_bulat'    => '143',
            'harga_sortiran'    => '2500',
            'tonase_sortiran'    => '180',
            'total_super'    => '750000',
            'total_bulat'    => '429000',
            'total_sortiran'    => '450000',
            'total_biaya_beli'    => '1629000',
            'total_tonase_beli'    => '573',
            'periode_id'  => '3',
            'datausaha_id'  => '1',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);
    }
    // }
}