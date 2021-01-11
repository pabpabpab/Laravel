<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'id',
        'category_id',
        'title',
        'about',
        'content'
    ];

    public function getAllByPage($perPage) {
        return static::query()
            ->select('news.id', 'category_id', 'title', 'about', 'news_categories.name as category_name')
            ->leftJoin('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }

    public function getByCategoryId(int $categoryId) {
        return static::query()
            ->where('category_id', $categoryId)
            ->get();
    }

    public function getById(int $id) {
        return static::find($id);
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }

    public function saveNewOne($input) {
        $this->fill($input);
        return $this->save();
    }

    public function saveOldOne($input) {
        $model = $this->find((int) $input['id']);
        $model->fill($input);
        return $model->save();
    }

    public function deleteOne($id) {
        $model = $this->find($id);
        return $model->delete();
    }
}
