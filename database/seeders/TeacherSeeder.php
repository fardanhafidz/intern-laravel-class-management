<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            'name' => 'Mirza',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Ali',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Sandi',
        ]);
    }
}
