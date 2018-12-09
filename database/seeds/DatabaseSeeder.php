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
        // Call function for delete all records on each table
        $this->truncateTables([
            'professions',
            'users',
        ]);
        // $this->call(UsersTableSeeder::class);
        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);
    }

    protected function truncateTables(array $tables)
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        // Delete all records on each $table
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
