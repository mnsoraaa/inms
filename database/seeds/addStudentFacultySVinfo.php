<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon; 

class addStudentFacultySVinfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Student2',
            'address' => 'KK2',
            'tel' => '0123456789',
            'email' => 'student2@example.com',
            'matricID' => 'CB12222',
            'position' => '5',
            'companyName' => 'SDW',
            'companyAdd' => 'FSKKP',
            'companyTel' => '1234567890',
            'image' => '',
            'password' => bcrypt('student'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Student3',
            'address' => 'KK3',
            'tel' => '0123456789',
            'email' => 'student3@example.com',
            'matricID' => 'CB13333',
            'position' => '5',
            'companyName' => 'SDW',
            'companyAdd' => 'FSKKP',
            'companyTel' => '1234567890',
            'image' => '',
            'password' => bcrypt('student'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Student4',
            'address' => 'KK4',
            'tel' => '0123456789',
            'email' => 'student4@example.com',
            'matricID' => 'CB14444',
            'position' => '5',
            'companyName' => 'SDW',
            'companyAdd' => 'FSKKP',
            'companyTel' => '1234567890',
            'image' => '',
            'password' => bcrypt('student'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Student5',
            'address' => 'KK5',
            'tel' => '0123456789',
            'email' => 'student5@example.com',
            'matricID' => 'CB15555',
            'position' => '5',
            'companyName' => 'SDW',
            'companyAdd' => 'FSKKP',
            'companyTel' => '1234567890',
            'image' => '',
            'password' => bcrypt('student'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Faculty SV2',
            'address' => 'FSKKP',
            'tel' => '2222222222',
            'email' => 'facultysv2@example.com',
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
            'name' => 'Faculty SV3',
            'address' => 'FSKKP',
            'tel' => '333333333',
            'email' => 'facultysv3@example.com',
            'matricID' => '',
            'position' => '3',
            'companyName' => '',
            'companyAdd' => '',
            'companyTel' => '',
            'image' => '',
            'password' => bcrypt('facultysv'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
