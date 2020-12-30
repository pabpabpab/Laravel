<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class News
{
    public function getCategories() {
        return DB::table('news_categories')
            ->get();
    }

    public function getByCategory(string $topic) {
        $category = DB::table('news_categories')
            ->where('name', $topic)
            ->get();

        $category_id = $category[0]->id;

        return DB::table('news')
            ->where('category_id', $category_id)
            ->get();
    }

    public function getById(int $newsId) {
        return DB::table('news')
            ->where('id', $newsId)
            ->get();
    }
}
