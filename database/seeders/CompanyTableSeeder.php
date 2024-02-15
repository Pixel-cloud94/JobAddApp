<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = [
            ['name' => 'SAP', 'address' => 'Hasso-Plattner-Ring 7, 69190 Walldorf', 'email' => 'SAPA@example.com', 'phone' => '+49/6227/7-47474'],
            ['name' => 'GHD GesundHeits GmbH Deutschland', 'address' => ' Bogenstraße 28a, 22926 Ahrensburg', 'email' => 'GHD@example.com', 'phone' => '+494102/5167-0'],
            
        ];

        foreach ($company as $companyData) {
            Company::create($companyData);
        }
    }
}
