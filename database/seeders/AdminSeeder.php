<?php

namespace Database\Seeders;

// use App\Http\Middleware\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = new Admin();
        $admin->image = '/test';
        $admin->name = 'Super User';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('password'); //password
        $admin->status = 1; //password
        $admin->save();
    }
}
