<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatausahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create('id_ID');

        // for ($i = 1; $i <= 50; $i++) {
        //     DB::table('datausahas')->insert([
        //         'nama_usaha' => $faker->name,
        //         'slug' => Str::slug($faker->name, '-'),
        //         'created_at' => $faker->date(now()),
        //         'updated_at' => $faker->date(now()),
        //     ]);
        // }

        $faker = Faker::create('id_ID');

        DB::table('datausahas')->insert([
            'id'    => '1',
            'nama_usaha' => 'Usaha Pepaya',
            'slug' => 'usaha-pepaya',
            'kategori' => 'buah',
            'created_at'    => $faker->date(now()),
            'updated_at'    => $faker->date(now()),
        ]);
        DB::table('datausahas')->insert([
            'id'    => '2',
            'nama_usaha' => 'Usaha Ternak Sapi',
            'slug' => 'usaha-ternak-sapi',
            'kategori' => 'peternakan',
            'created_at'    => $faker->date(now()),
            'updated_at'    => $faker->date(now()),
        ]);
        DB::table('datausahas')->insert([
            'id'    => '3',
            'nama_usaha' => 'Usaha Dagang',
            'slug' => 'usaha-dagang',
            'kategori' => 'dagang',
            'created_at'    => $faker->date(now()),
            'updated_at'    => $faker->date(now()),
        ]);
        DB::table('datausahas')->insert([
            'id'    => '4',
            'nama_usaha' => 'Usaha Kebun',
            'slug' => 'usaha-kebun',
            'kategori' => 'kebun',
            'created_at'    => $faker->date(now()),
            'updated_at'    => $faker->date(now()),
        ]);
    }
}