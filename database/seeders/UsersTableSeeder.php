<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'HR',
            'email'     => 'hr@gmail.com',
            'password'  => Hash::make('hr12345'),
            'roles'     => 'HR'
        ]);

        DB::table('users')->insert([
            'name'      => 'Farid',
            'email'     => 'farid@gmail.com',
            'password'  => Hash::make('farid123'),
            'roles'     => 'Supervisor'
        ]);

        DB::table('users')->insert([
            'name'      => 'Haikal',
            'email'     => 'haikal@gmail.com',
            'password'  => Hash::make('haikal123'),
            'roles'     => 'Supervisor'
        ]);

        DB::table('users')->insert([
            'name'      => 'Ibnu',
            'email'     => 'ibnu@gmail.com',
            'password'  => Hash::make('ibnu1234'),
            'roles'     => 'Manager'
        ]);

        DB::table('users')->insert([
            'name'      => 'Syaebani',
            'email'     => 'syaebani@gmail.com',
            'password'  => Hash::make('syaebani123'),
            'roles'     => 'Manager'
        ]);

        DB::table('users')->insert([
            'name'      => 'Ade',
            'email'     => 'ade@gmail.com',
            'password'  => Hash::make('ade12345'),
            'roles'     => 'Manager'
        ]);

        DB::table('users')->insert([
            'name'      => 'Aji',
            'email'     => 'aji@gmail.com',
            'password'  => Hash::make('aji12345'),
            'roles'     => 'Karyawan'
        ]);

        DB::table('users')->insert([
            'name'      => 'Budi',
            'email'     => 'budi@gmail.com',
            'password'  => Hash::make('budi1234'),
            'roles'     => 'Karyawan'
        ]);

        DB::table('users')->insert([
            'name'      => 'Alif',
            'email'     => 'alif@gmail.com',
            'password'  => Hash::make('alif1234'),
            'roles'     => 'Karyawan'
        ]);

        DB::table('users')->insert([
            'name'      => 'Ilham',
            'email'     => 'ilham@gmail.com',
            'password'  => Hash::make('ilham123'),
            'roles'     => 'Karyawan'
        ]);

        DB::table('users')->insert([
            'name'      => 'Dodo',
            'email'     => 'dodo@gmail.com',
            'password'  => Hash::make('dodo1234'),
            'roles'     => 'Karyawan'
        ]);
    }
}
