<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')
            ->insert($this->generateData());
    }

    protected function generateData(): array
    {
        $data = [];
        $unicStr = uniqid();
        $data[] = [
            'category_id' => rand(1, 3),
            'title' => 'Test title ' . $unicStr,
            'about' => 'Test about ' . $unicStr,
            'content' => 'Test content ' . $unicStr
        ];
        return $data;
    }
}
