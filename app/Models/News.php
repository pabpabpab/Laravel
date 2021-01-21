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

    /*
     * при валидации данных модели лучше здесь хранить правила
    public static function rules()
    {
        return [
            'title' => 'required|min:10|max:255|unique:news',
            'about' => 'required|min:10|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:news_categories,id|integer'
        ];
    }
   */
    public function getAll() {
        return static::query()
            ->select('news.id', 'category_id', 'title', 'about', 'news_categories.name as category_name')
            ->leftJoin('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->orderBy('id', 'desc');
    }

    public function getByCategoryId(int $categoryId) {
        return static::query()
            ->where('category_id', $categoryId)
            ->get();
    }

    public function getById(int $id) {
        return static::find($id);
    }

    public function saveOne($input) {
        $oldId = 0;
        if (isset($input['id'])) {
            $oldId = (int) $input['id'];
        }
        $model = $oldId ? $this->find($oldId) : new News();
        $model->fill($input);
        return [
            'result' => $model->save(),
            'oldId' => $oldId
        ];
    }

    public function deleteOne($id) {
        $model = $this->find($id);
        return [
            'result' => $model->delete(),
            'oldId' => $id
        ];
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }
}
