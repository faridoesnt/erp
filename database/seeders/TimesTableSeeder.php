<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')->insert([
            'name'     => 'Jam Masuk',
            'time'     => '07:00:00',  
        ]);

        DB::table('times')->insert([
            'name'     => 'Jam Keluar',
            'time'     => '17:00:00',  
        ]);

        DB::table('times')->insert([
            'name'     => 'Telat',
            'time'     => '07:30:00',  
        ]);
    }
}
