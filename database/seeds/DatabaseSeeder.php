<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tables = ['bases', 's_bases'];

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        $this->call(BaseSeeder::class);
        $this->call(SBaseSeeder::class);
    }
}
