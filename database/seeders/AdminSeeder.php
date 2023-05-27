<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->delete();
        Admin::create([
            'name'=>'Blood bank',
            'email'=>'blood_bank@gmail.com',
            'password'=>crypt('12345678',PASSWORD_DEFAULT),
        ]);
    }
}
