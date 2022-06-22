<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class TeacherSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $data = [
            [
                'name'    => Str::random(10),
                'email'   => Str::random(10) . '@gmail.com',
                'address' => Str::random(20),
            ],
            [
                'name'    => Str::random(10),
                'email'   => Str::random(10) . '@gmail.com',
                'address' => Str::random(20),
            ],
            [
                'name'    => Str::random(10),
                'email'   => Str::random(10) . '@gmail.com',
                'address' => Str::random(20),
            ],
            [
                'name'    => Str::random(10),
                'email'   => Str::random(10) . '@gmail.com',
                'address' => Str::random(20),
            ],
            [
                'name'    => Str::random(10),
                'email'   => Str::random(10) . '@gmail.com',
                'address' => Str::random(20),
            ],
            [
                'name'    => Str::random(10),
                'email'   => Str::random(10) . '@gmail.com',
                'address' => Str::random(20),
            ],
        ];

        DB::table('teache')->insert($data);
    }
}
