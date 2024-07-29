<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classrooms')->insert([
            'name' => 'RPL',
            'teacher_id' => '1'
        ]);
        DB::table('classrooms')->insert([
            'name' => 'TKJ',
            'teacher_id' => '2'
        ]);
        DB::table('classrooms')->insert([
            'name' => 'DMM',
            'teacher_id' => '3'
        ]);
    }
}
