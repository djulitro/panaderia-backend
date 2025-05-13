<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // crear usuario
        $user = new User();

        $user->name = 'Admin';
        $user->last_name = 'Admin';
        $user->email = 'admin@admin.cl';
        $user->password = Hash::make('1234');
        $user->organization_id = 1;
        
        $user->save();
    }
}
