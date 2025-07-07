<?php

namespace SchoolApi\EducationLevel\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EducationLevelDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();

            Schema::disableForeignKeyConstraints();

            DB::table("level")->truncate();
            DB::table("sublevel")->truncate();

            $this->call([
                LevelSeeder::class,
                SublevelSeeder::class
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        } finally {
            Schema::enableForeignKeyConstraints();
        }
    }
}
