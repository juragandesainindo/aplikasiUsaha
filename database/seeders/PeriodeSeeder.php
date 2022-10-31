<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodes')->insert([
            'id'            => '1',
            'keterangan'    => 'Summary 1-3 juli 2022',
            'tanggal_awal'  => '2022-07-01',
            'tanggal_akhir' => '2022-07-03',
            'slug'          => 'summary-01-03-juli-2022',
            'datausaha_id'  => '1',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);
        DB::table('periodes')->insert([
            'id'            => '2',
            'keterangan'    => 'Summary 4-5 juli 2022',
            'tanggal_awal'  => '2022-07-04',
            'tanggal_akhir' => '2022-07-05',
            'slug'          => 'summary-04-05-juli-2022',
            'datausaha_id'  => '1',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);
        DB::table('periodes')->insert([
            'id'            => '3',
            'keterangan'    => 'Summary 6-8 juli 2022',
            'tanggal_awal'  => '2022-07-06',
            'tanggal_akhir' => '2022-07-08',
            'slug'          => 'summary-06-08-juli-2022',
            'datausaha_id'  => '1',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);

        DB::table('periodes')->insert([
            'id'            => '4',
            'keterangan'    => 'Summary 1-3 juli 2022',
            'tanggal_awal'  => '2022-07-01',
            'tanggal_akhir' => '2022-07-03',
            'slug'          => 'summary-01-03-juli-2022',
            'datausaha_id'  => '2',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);
        DB::table('periodes')->insert([
            'id'            => '5',
            'keterangan'    => 'Summary 4-5 juli 2022',
            'tanggal_awal'  => '2022-07-04',
            'tanggal_akhir' => '2022-07-05',
            'slug'          => 'summary-04-05-juli-2022',
            'datausaha_id'  => '2',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);
        DB::table('periodes')->insert([
            'id'            => '6',
            'keterangan'    => 'Summary 6-8 juli 2022',
            'tanggal_awal'  => '2022-07-06',
            'tanggal_akhir' => '2022-07-08',
            'slug'          => 'summary-06-08-juli-2022',
            'datausaha_id'  => '2',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);

        DB::table('periodes')->insert([
            'id'            => '7',
            'keterangan'    => 'Summary 1-3 juli 2022',
            'tanggal_awal'  => '2022-07-01',
            'tanggal_akhir' => '2022-07-03',
            'slug'          => 'summary-01-03-juli-2022',
            'datausaha_id'  => '3',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);
        DB::table('periodes')->insert([
            'id'            => '8',
            'keterangan'    => 'Summary 4-5 juli 2022',
            'tanggal_awal'  => '2022-07-04',
            'tanggal_akhir' => '2022-07-05',
            'slug'          => 'summary-04-05-juli-2022',
            'datausaha_id'  => '3',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);
        DB::table('periodes')->insert([
            'id'            => '9',
            'keterangan'    => 'Summary 6-8 juli 2022',
            'tanggal_awal'  => '2022-07-06',
            'tanggal_akhir' => '2022-07-08',
            'slug'          => 'summary-06-08-juli-2022',
            'datausaha_id'  => '3',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);

        DB::table('periodes')->insert([
            'id'            => '10',
            'keterangan'    => 'Summary 1-3 juli 2022',
            'tanggal_awal'  => '2022-07-01',
            'tanggal_akhir' => '2022-07-03',
            'slug'          => 'summary-01-03-juli-2022',
            'datausaha_id'  => '4',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);
        DB::table('periodes')->insert([
            'id'            => '11',
            'keterangan'    => 'Summary 4-5 juli 2022',
            'tanggal_awal'  => '2022-07-04',
            'tanggal_akhir' => '2022-07-05',
            'slug'          => 'summary-04-05-juli-2022',
            'datausaha_id'  => '4',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);
        DB::table('periodes')->insert([
            'id'            => '12',
            'keterangan'    => 'Summary 6-8 juli 2022',
            'tanggal_awal'  => '2022-07-06',
            'tanggal_akhir' => '2022-07-08',
            'slug'          => 'summary-06-08-juli-2022',
            'datausaha_id'  => '4',
            'created_at'    => date(now()),
            'updated_at'    => date(now()),
        ]);
    }
}