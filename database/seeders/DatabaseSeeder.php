<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Patient::factory(10)->create();


        //Doctor
        Doctor::create([
            'code_doctor' => '1',
            'name' => 'Dr. John Doe',
            'address' => '123 Main St.',
            'specialist' => 'General Practitioner',
        ]);

        Doctor::create([
            'code_doctor' => '2',
            'name' => 'Dr. Jane Doe',
            'address' => '123 Main St.',
            'specialist' => 'General Practitioner',
        ]);

        Doctor::create([
            'code_doctor' => '3',
            'name' => 'Dr. John Smith',
            'address' => '123 Main St.',
            'specialist' => 'General Practitioner',
        ]);

        Doctor::create([
            'code_doctor' => '4',
            'name' => 'Dr. Jane Smith',
            'address' => '123 Main St.',
            'specialist' => 'General Practitioner',
        ]);

        Doctor::create([
            'code_doctor' => '5',
            'name' => 'Dr. John Jones',
            'address' => '123 Main St.',
            'specialist' => 'General Practitioner',
        ]);

        Doctor::create([
            'code_doctor' => '6',
            'name' => 'Dr. Jane Jones',
            'address' => '123 Main St.',
            'specialist' => 'General Practitioner',
        ]);
    }
}
