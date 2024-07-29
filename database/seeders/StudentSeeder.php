<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'name'      => 'Fika',
            'nis'     => '19070122',
            'classroom_id'  => 1,
        ]);

        DB::table('students')->insert([
            'name'      => 'Ridaul',
            'nis'     => '19070123',
            'classroom_id'  => 2,
        ]);

        DB::table('students')->insert([
            'name'      => 'Maulayya',
            'nis'     => '19070124',
            'classroom_id'  => 3,
        ]);
    }
}
