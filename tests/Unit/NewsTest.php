<?php

namespace Tests\Unit;

use App\Models\News;
use PHPUnit\Framework\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testNews()
    {
        $model = new News();

        $data = $model->getById(3);
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
        $this->assertNotEmpty($data['title']);
        $this->assertNotEmpty($data['about']);
        $this->assertNotEmpty($data['body']);


        $data = $model->getCategories();
        $this->assertIsArray($data);
        foreach($data as $key => $value){
            $this->assertNotEmpty($key);
            $this->assertNotEmpty($value);
        }

        $wholeNewsArray = $model->getWholeNewsArray();
        foreach ($wholeNewsArray as $topic => $dataset) {
            $catNews = $model->getByCategory($topic);
            $this->assertIsArray($catNews);
            $this->assertNotEmpty($catNews);
        }
    }
}
