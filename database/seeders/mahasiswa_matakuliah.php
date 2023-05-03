<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mahasiswa_matakuliah extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'mahasiswa_id' => 2141720000,
                'matakuliah_id' => 1,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 2141720001,
                'matakuliah_id' => 2,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 2141720007,
                'matakuliah_id' => 3,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 2141720022,
                'matakuliah_id' => 4,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 2141720070,
                'matakuliah_id' => 5,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 2141720072,
                'matakuliah_id' => 10,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 2141720076,
                'matakuliah_id' => 9,
                'nilai' => 'C',
            ],
            [
                'mahasiswa_id' => 2141720143,
                'matakuliah_id' => 6,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 2141720171,
                'matakuliah_id' => 7,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 214172027,
                'matakuliah_id' => 11,
                'nilai' => 'B+',
            ],
            [
                'mahasiswa_id' => 214172071,
                'matakuliah_id' => 12,
                'nilai' => 'C+',
            ],
            [
                'mahasiswa_id' => 214172079,
                'matakuliah_id' => 8,
                'nilai' => 'B',
            ],
        ];
        DB::table('mahasiswa_matakuliah')->insert($data);
    }
}