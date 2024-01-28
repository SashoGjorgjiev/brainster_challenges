<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User;
        $admin->name = 'Admin';
        $admin->email = 'admin@admin.com';
        $admin->password = Hash::make('test1234');
        $admin->is_admin = true;
        $admin->save();
    }
}
