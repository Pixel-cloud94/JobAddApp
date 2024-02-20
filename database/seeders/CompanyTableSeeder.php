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
    $companies = [
        ['name' => 'TechMansion', 'address' => '10880 Malibu Point, Malibu, CA   90265', 'email' => 'techmansion@example.com', 'phone' => '+1/310/555-1234'],
        ['name' => 'StarkTech', 'address' => '10880 Malibu Point, Malibu, CA   90265', 'email' => 'starktech@example.com', 'phone' => '+1/310/555-1234'],
        ['name' => 'S.H.I.E.L.D. Industries', 'address' => '1601 Rhode Island Ave NW, Washington, DC   20555', 'email' => 'shieldindustries@example.com', 'phone' => '+1/202/555-1234'],
        ['name' => 'The Avengers Foundation', 'address' => '142nd Street, New York, NY   10001', 'email' => 'avengersfoundation@example.com', 'phone' => '+1/212/555-1234'],
        ['name' => 'Wayne Enterprises', 'address' => '1007 Mountain Drive, Gotham City, Gotham', 'email' => 'wayneenterprises@example.com', 'phone' => '+1/212/555-1234'],
        ['name' => 'LexCorp', 'address' => '1007 Mountain Drive, Gotham City, Gotham', 'email' => 'lexcorp@example.com', 'phone' => '+1/212/555-1234'],
        ['name' => 'Hydra Corp', 'address' => '1007 Mountain Drive, Gotham City, Gotham', 'email' => 'hydracorp@example.com', 'phone' => '+1/212/555-1234'],
        ['name' => 'Arkham Asylum', 'address' => '1007 Mountain Drive, Gotham City, Gotham', 'email' => 'arkhamasylum@example.com', 'phone' => '+1/212/555-1234'],
        ['name' => 'Black Ops', 'address' => '1007 Mountain Drive, Gotham City, Gotham', 'email' => 'blackops@example.com', 'phone' => '+1/212/555-1234'],
        ['name' => 'X-Force', 'address' => '1007 Mountain Drive, Gotham City, Gotham', 'email' => 'xforce@example.com', 'phone' => '+1/212/555-1234'],
    ];

    foreach ($companies as $companyData) {
        Company::create($companyData);
    }
}

}
