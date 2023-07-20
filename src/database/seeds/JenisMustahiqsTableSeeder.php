<?php

use Illuminate\Database\Seeder;
use App\JenisMustahiq;

class JenisMustahiqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenises = 
        [    
            [
            'jenis' => 'Fakir',
            'keterangan' => 'orang yang tidak memiliki harta',
            'jumlah_bagian' => '150000'
            ],
            [
            'jenis' => 'Miskin',
            'keterangan' => 'orang yang penghasilannya tidak mencukupi',
            'jumlah_bagian' => '150000'
            ],
            [
            'jenis' => 'Riqab',
            'keterangan' => 'hamba sahaya atau budak',
            'jumlah_bagian' => '150000'
            ],
            [
            'jenis' => 'Gharim',
            'keterangan' => 'orang yang memiliki banyak hutang',
            'jumlah_bagian' => '150000'
            ],
            [
            'jenis' => 'Mualaf',
            'keterangan' => 'orang yang baru masuk Islam',
            'jumlah_bagian' => '150000'
            ],
            [
            'jenis' => 'Fisabilillah',
            'keterangan' => 'pejuang di jalan Allah',
            'jumlah_bagian' => '150000'
            ],
            [
            'jenis' => 'Ibnu Sabil',
            'keterangan' => 'musafir dan para pelajar perantauan',
            'jumlah_bagian' => '150000'
            ],
            [
            'jenis' => 'Amil Zakat',
            'keterangan' => 'panitia penerima dan pengelola dana zakat',
            'jumlah_bagian' => '150000'
            ]
        ];
        foreach ($jenises as $jenis) {
            JenisMustahiq::create($jenis);
        }
    }
}
