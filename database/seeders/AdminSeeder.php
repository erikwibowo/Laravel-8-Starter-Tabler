<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'      => 'Admin',
            'email'     => 'admin@admin.com',
            'phone'     => '081510815414',
            'address'   => 'Kajen',
            'level'     => 'Admin',
            'password'  => Hash::make('admin')
        ]);
    }
}
