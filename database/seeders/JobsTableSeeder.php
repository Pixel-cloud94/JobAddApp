<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           // Seed jobs
           $jobs = [
            ['name' => 'Software Developer SAP', 'company_id' => 1, 'category_id' => 8],
            ['name' => 'Healthcare Adviser', 'company_id' => 2, 'category_id' => 2],
            
        ];

        foreach ($jobs as $jobData) {
            Job::create($jobData);
        }
    }
}
