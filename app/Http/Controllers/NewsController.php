<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news = [
        'culture' => [
            'list' => [
                1 => [
                    'title' => 'The street art that expressed the worlds pain',
                    'about' => 'In 2020, murals in cities all over the globe gave voice to black protest and resistance.',
                    'body' => ' Text text text text text 1',
                ],
                2 => [
                    'title' => 'Why Hollywood gets the Irish so wrong',
                    'about' => 'Romantic comedy Wild Mountain Thyme\'s take on Irish life has been mocked',
                    'body' => ' Text text text text text 2',
                ],
                3 => [
                    'title' => 'Cottagecore and the rise of the modern rural fantasy',
                    'about' => 'How did a bucolic dreamland became the perfect escape from real life?',
                    'body' => ' Text text text text text 3',
                ],
            ],
        ],
        'music' => [
            'list' => [
                1 => [
                    'title' => 'Andrew Weatherall: The 90s master of the remix',
                    'about' => 'As a producer, Andrew Weatherall, was always thinking about the wrong thing to do',
                    'body' => ' Text text text text text 1',
                ],
                2 => [
                    'title' => 'The 20 best songs of 2019',
                    'about' => 'Artists that most defined an eventful year in music',
                    'body' => ' Text text text text text 2',
                ],
                3 => [
                    'title' => 'The greatest hip-hop songs of all time',
                    'about' => 'BBC Music polled over 100 critics in 15 countries to find the best hip-hop song ever',
                    'body' => ' Text text text text text 3',
                ],
            ]
        ],
        'sport' => [
            'list' => [
                1 => [
                    'title' => 'Aphiwe Dyantyi: South Africa wing given four-year ban for doping',
                    'about' => 'Dyantyi has been given a four-year ban after positive for performance-enhancing substances.',
                    'body' => ' Text text text text text 1',
                ],
                2 => [
                    'title' => 'Cristiano Ronaldo has scored 14 goals for Juventus this season',
                    'about' => 'Ronaldo scored two penalties to earn a Serie A victory for Juventus at struggling Genoa.',
                    'body' => ' Text text text text text 2',
                ],
                3 => [
                    'title' => 'Formula 1: There are worse things to be than a billionaire son',
                    'about' => 'For Lance Stroll, money has always been an issue - just never the lack of it.',
                    'body' => ' Text text text text text 3',
                ],
            ]
        ],
    ];

    public function index()
    {
        $this->headerRender();
        $this->categoriesRender();
        exit;
    }

    public function newsCategory($topic)
    {
        $this->headerRender();
        $this->oneCategoryRender($topic);
        $this->categoriesRender();
        exit;
    }

    public function newsCard($topic, $id)
    {
        $this->headerRender();
        echo "<h1>".$this->news[$topic]['list'][$id]['title']."</h1>";
        echo"<p style='text-align:justify;margin-bottom:50px;'>".$this->news[$topic]['list'][$id]['body']."</p>";
        $this->oneCategoryRender($topic);
        $this->categoriesRender();
        exit;
    }

    protected function categoriesRender()
    {
        echo "<h1>News categories</h1>";

        foreach ($this->news as $topic => $item) {
            $url = route('news-category', ['topic' => $topic]);
            echo "<div><a href='{$url}'>".ucfirst($topic)."</a></div>";
        }
    }

    protected function oneCategoryRender($topic)
    {
        echo "<h1>".ucfirst($topic)."</h1>";

        echo"<div style='margin-bottom:50px;'>";
        foreach ($this->news[$topic]['list'] as $id => $item) {
            $url = route('news-card', [
                'topic' => $topic,
                'id' => $id,
                'title' => implode('-', explode(' ', strtolower($item['title'])))
            ]);
            echo "<div>
                     <a href='{$url}'>".$item['title']."</a>
                     <p style='margin:0 0 30px 0;padding:0;'>".$item['about']."</p>
                  </div>";
        }
        echo"</div>";
    }

    protected function headerRender()
    {
        echo "
        <div style='text-align:right;padding: 20px 0 0 0;margin-bottom:-30px;'>
        <a href='/' style='margin-left:50px;'>Main page</a>
        <a href='/admin/news' style='margin-left:50px;'>Admin</a>
        </div>
        ";
    }

}
