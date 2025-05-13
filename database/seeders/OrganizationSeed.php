<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organization = new Organization();

        $organization->name = 'prueba';
        $organization->code = 'prueba';
        $organization->address = 'prueba';
        $organization->timezone = '-3';

        $organization->save();
    }
}
