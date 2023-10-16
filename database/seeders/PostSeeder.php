<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
                'name' => '獺祭',
                'area' => '山口県岩国市',
                'rice' => '山田錦・精米歩合39%',
                'flavor' => '甘口',
                'taste' => 'すっきり',
                'alcholcontent' => '16%',
                'match' => '油揚げのチーズ焼き',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
