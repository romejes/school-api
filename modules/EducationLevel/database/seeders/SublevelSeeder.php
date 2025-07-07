<?php

namespace SchoolApi\EducationLevel\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SublevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("sublevel")
            ->insert([
                [
                    "id" => 1,
                    "level_id" => 1,
                    "code" => "INI3",
                    "name" => "3 años",
                ],
                [
                    "id" => 2,
                    "level_id" => 1,
                    "code" => "INI4",
                    "name" => "4 años",
                ],
                [
                    "id" => 3,
                    "level_id" => 1,
                    "code" => "INI5",
                    "name" => "5 años",
                ],
                [
                    "id" => 4,
                    "level_id" => 2,
                    "code" => "PRI1",
                    "name" => "1er grado",
                ],
                [
                    "id" => 5,
                    "level_id" => 2,
                    "code" => "PRI2",
                    "name" => "2do grado",
                ],
                [
                    "id" => 6,
                    "level_id" => 2,
                    "code" => "PRI3",
                    "name" => "3er grado",
                ],
                [
                    "id" => 7,
                    "level_id" => 2,
                    "code" => "PRI4",
                    "name" => "4to grado",
                ],
                [
                    "id" => 8,
                    "level_id" => 2,
                    "code" => "PRI5",
                    "name" => "5to grado",
                ],
                [
                    "id" => 9,
                    "level_id" => 2,
                    "code" => "PRI6",
                    "name" => "6to grado",
                ],
                [
                    "id" => 10,
                    "level_id" => 3,
                    "code" => "SEC1",
                    "name" => "1er grado",
                ],
                [
                    "id" => 11,
                    "level_id" => 3,
                    "code" => "SEC2",
                    "name" => "2do grado",
                ],
                [
                    "id" => 12,
                    "level_id" => 3,
                    "code" => "SEC3",
                    "name" => "3er grado",
                ],
                [
                    "id" => 13,
                    "level_id" => 3,
                    "code" => "SEC4",
                    "name" => "4to grado",
                ],
                [
                    "id" => 14,
                    "level_id" => 3,
                    "code" => "SEC5",
                    "name" => "5to grado",
                ],
            ]);
    }
}
