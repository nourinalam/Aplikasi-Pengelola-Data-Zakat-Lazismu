<?php

use Illuminate\Database\Seeder;
use App\JenisZakat;

class JenisZakatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisZakat::create([
            [
                'jenis' => '0',//jenis untuk beras
                'nominal' =>'0'
            ],
            [
                'jenis' => '1',//jenis untuk zakat maal
                'nominal' =>'1'
            ]
            
        ]);
    }
}
