<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('users')->insert([
            ['username' => 'Snoopy',
            'email' => 'Snoopy@peanuts.com',
            'password' => bcrypt('Snoopy01')],
            ['username' => 'Woodstock',
            'email' => 'Woodstock@peanuts.com',
            'password' => bcrypt('Woodstock02')],
            ['username' => 'Charlie Brown',
            'email' => 'Charlie_Brown@peanuts.com',
            'password' => bcrypt('Charlie_Brown03')],
            ['username' => 'Sally',
            'email' => 'Sally@peanuts.com',
            'password' => bcrypt('Sally04')],
            ['username' => 'Linus',
            'email' => 'Linus@peanuts.com',
            'password' => bcrypt('Linus05')]
        ]);
    }
}
