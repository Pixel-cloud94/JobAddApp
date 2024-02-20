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
            ['name' => 'Software Developer', 'company_id' =>   1, 'category_id' =>   1], // Technology
            ['name' => 'Security Analyst', 'company_id' =>   2, 'category_id' =>   2], // Security
            ['name' => 'Superhero Coach', 'company_id' =>   3, 'category_id' =>   3], // Heroics
            ['name' => 'Entertainment Manager', 'company_id' =>   4, 'category_id' =>   4], // Entertainment
            ['name' => 'Corporate Lawyer', 'company_id' =>   5, 'category_id' =>   5], // Corporate
            ['name' => 'Criminal Investigator', 'company_id' =>   6, 'category_id' =>   6], // Criminal
            ['name' => 'Medical Researcher', 'company_id' =>   7, 'category_id' =>   7], // Medical
            ['name' => 'Military Strategist', 'company_id' =>   8, 'category_id' =>   8], // Military
            ['name' => 'Special Operations Officer', 'company_id' =>   9, 'category_id' =>   9], // Special Operations
            ['name' => 'Educational Consultant', 'company_id' =>   10, 'category_id' =>   10], // Education
        ];
    
        foreach ($jobs as $jobData) {
            Job::create($jobData);
        }
    }
}
