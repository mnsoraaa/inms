<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon; 

class UsersDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Student',
            'address' => 'KK2',
            'tel' => '0123456789',
            'email' => 'student@example.com',
            'matricID' => 'CB12345',
            'position' => '5',
            'companyName' => 'SDW',
            'companyAdd' => 'FSKKP',
            'companyTel' => '1234567890',
            'image' => '',
            'password' => bcrypt('student'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'JJIM',
            'address' => 'Bangunan JJIM',
            'tel' => '1111111111',
            'email' => 'jjim@example.com',
            'matricID' => '',
            'position' => '1',
            'companyName' => '',
            'companyAdd' => '',
            'companyTel' => '',
            'image' => '',
            'password' => bcrypt('jjim'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
        	'name' => 'Coordinator',
            'address' => 'FSKKP',
            'tel' => '222222222',
            'email' => 'coordinator@example.com',
            'matricID' => '',
            'position' => '2',
            'companyName' => '',
            'companyAdd' => '',
            'companyTel' => '',
            'image' => '',
            'password' => bcrypt('coordinator'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Faculty SV',
            'address' => 'FSKKP',
            'tel' => '333333333',
            'email' => 'facultysv@example.com',
            'matricID' => '',
            'position' => '3',
            'companyName' => '',
            'companyAdd' => '',
            'companyTel' => '',
            'image' => '',
            'password' => bcrypt('facultysv'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Industrial SV',
            'address' => 'Software House',
            'tel' => '4444444444',
            'email' => 'industrialsv@example.com',
            'matricID' => '',
            'position' => '4',
            'companyName' => 'ProgramEnterprise',
            'companyAdd' => 'Software House',
            'companyTel' => '1123456789',
            'image' => '',
            'password' => bcrypt('industrialsv'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
