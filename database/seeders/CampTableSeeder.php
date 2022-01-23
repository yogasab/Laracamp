<?php

namespace Database\Seeders;

use App\Models\Camp;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'Gila Belajar';
        $title2 = 'Baru Mulai';

        $camps = [
            [
                'title' => $title,
                'slug' => Str::slug($title),
                'price' => random_int(100, 1000),
                'description' => "Program {$title} ini akan mengajak Anda untuk belajar penuh mulai dari pengenalan dasar sampai membangun sebuah projek asli",
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ], [
                'title' => $title2,
                'slug' => Str::slug($title2),
                'price' => random_int(100, 1000),
                'description' => "Program {$title2} ini akan mengajak Anda untuk belajar penuh mulai dari pengenalan dasar sampai membangun sebuah projek asli",
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        ];

        foreach ($camps as $camp) {
            Camp::create($camp);
        }
    }
}
