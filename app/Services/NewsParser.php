<?php

namespace App\Services;


use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsParser
{
    const assocCategories = [
        'Бывший СССР' => 9,
        'Дом' => 7,
        'Из жизни' => 11,
        'Мир' => 5,
        'Наука и техника' => 10,
        'Россия' => 6,
        'Экономика' => 8,
        'Спорт' => 3,
    ];

    protected $xmlDOM = null;
    protected $parsed = [];
    protected $prepared = [];

    public function load($source)
    {
        $this->xmlDOM = XmlParser::load($source);
        return $this;
    }

    public function parse()
    {
        $this->parsed = $this->xmlDOM->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description,category]'],
        ]);

        return $this;
    }


    public function prepare()
    {
        $prepared = [];
        foreach ($this->parsed['items'] as $item) {
            $title = trim($item['title']);
            $categoryId = static::getCategoryId($item['category']);
            $content = trim($item['description']);
            $content=str_replace(["\t", "\n", "\""], ["", "", ""], $content);
            $about = implode(' ',
                array_slice(
                    explode(' ', mb_substr($content, 0, 210)),
                    0,
                    20
                )
            );

            $prepared[] = [
                'category_id' => $categoryId,
                'title' => $title,
                'about' => $about,
                'content' => $content,
            ];
        }

        // поставлю ограничение в 5 новостей
        //$prepared =  array_slice($prepared, 0, 2);

        $this->prepared = $prepared;

        return $this;
    }

    public function save() {
        return News::query()
            ->insert($this->prepared);
    }

    protected static function getCategoryId($key) {
        $categoryId = 5;
        if (array_key_exists($key, static::assocCategories)) {
            $categoryId = static::assocCategories[$key];
        }
        return $categoryId;
    }


    public function loadAndSave($source)
    {
        try {
            $this->load($source);
            $this->parse();
            $this->prepare();
            $this->save();
        } catch (\Exception $e) {
            //return false;
        }
    }
}



