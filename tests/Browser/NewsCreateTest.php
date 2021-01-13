<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSee('Category')
                ->assertSee('Title')
                ->assertSee('About')
                ->assertSee('Text')
                ->type('title', '')
                ->press('submit')
                ->assertSee('Поле «Заголовок новости» нужно заполнить')
                ->type('title', 'абв')
                ->press('submit')
                ->assertSee('Количество символов в поле «Заголовок новости» должно быть не меньше 10')
                ->type('about', '')
                ->press('submit')
                ->assertSee('Поле «Кратко о чем новость» нужно заполнить')
                ->type('about', 'абв')
                ->press('submit')
                ->assertSee('Количество символов в поле «Кратко о чем новость» должно быть не меньше 10')
                ->type('content', '')
                ->press('submit')
                ->assertSee('Поле «Текст новости» нужно заполнить')
                ->type('content', 'абв')
                ->press('submit')
                ->assertSee('Количество символов в поле «Текст новости» должно быть не меньше 10')
            ;

            // ->dump()
        });
    }
}
