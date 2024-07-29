<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            'name' => 'Math',
        ]);

        DB::table('subjects')->insert([
            'name' => 'Phisics',
        ]);

        DB::table('subjects')->insert([
            'name' => 'Art',
        ]);


        DB::table('student_subject')->insert([
            'student_id' => '1',
            'subject_id' => '1',
        ]);

        DB::table('student_subject')->insert([
            'student_id' => '2',
            'subject_id' => '2',
        ]);

        DB::table('student_subject')->insert([
            'student_id' => '3',
            'subject_id' => '3',
        ]);
    }
}
