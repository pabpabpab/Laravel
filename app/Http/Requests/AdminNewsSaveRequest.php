<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminNewsSaveRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:10|max:255',
            'about' => 'required|min:10|max:255',
            'content' => 'required|min:10',
            'category_id' => 'required|exists:news_categories,id'
        ];
    }

    public function attributes()
    {
        return [
            'title' => '«Заголовок новости»',
            'about' => '«Кратко о чем новость»',
            'content' => '«Текст новости»',
            'category_id' => '«Категория новости»'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute нужно заполнить.',
        ];
    }
}
