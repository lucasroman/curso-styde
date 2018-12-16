<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $professions = DB::select('SELECT id FROM professions WHERE
        //     title = ? LIMIT 0,1', ['Back-end developer']);

        DB::table('users')->insert([
            'name' => 'Lucas Roman',
            'email' => 'lucasroman@example.com',
            'password' => bcrypt('123'),
            'profession_id' => DB::table('professions')
                                ->whereTitle('Back-end developer')
                                ->value('id'),
        ]);
    }
}
