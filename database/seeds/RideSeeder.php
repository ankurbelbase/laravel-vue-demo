<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;
class RideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data
        DB::table('rides')->insert([
            'distance'=>'1000',
            'average_speed'=>'12',
            'duration_s'=>'260',
            'battery'=>4203,
            'latitude'=>51.71501,
            'longitude'=>8.75076,
        ]);

        DB::table('rides')->insert([
            'distance'=>'1000',
            'average_speed'=>'12',
            'duration_s'=>'260',
            'battery'=>4196,
            'latitude'=>51.715132,
            'longitude'=>8.746782,
        ]);

        DB::table('rides')->insert([
            'distance'=>'1000',
            'average_speed'=>'12',
            'duration_s'=>'260',
            'battery'=>4202,
            'latitude'=>51.715018,
            'longitude'=>8.746452,
        ]);

    }
}
