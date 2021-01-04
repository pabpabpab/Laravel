<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;

    protected $table = 'news_categories';

    public function getAll() {
        return static::all();
    }

    public function getNewsByCategoryId($categoryId) {
        return static::find($categoryId)->news;
    }

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }
}
