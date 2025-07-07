<?php

namespace SchoolApi\EducationLevel\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("level")
            ->insert([
                [
                    "id"    => 1,
                    "code"  => "INI",
                    "name"  => "Inicial",
                ],
                [
                    "id"    => 2,
                    "code"  => "PRI",
                    "name"  => "Primaria",
                ],
                [
                    "id"    => 3,
                    "code"  => "SEC",
                    "name"  => "Secundaria",
                ],
            ]);
    }
}
