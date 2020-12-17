<?php


namespace App\Models;


class News
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
                4 => [
                    'title' => 'Andrew Weatherall: The 90s master of the remix',
                    'about' => 'As a producer, Andrew Weatherall, was always thinking about the wrong thing to do',
                    'body' => ' Text text text text text 4',
                ],
                5 => [
                    'title' => 'The 20 best songs of 2019',
                    'about' => 'Artists that most defined an eventful year in music',
                    'body' => ' Text text text text text 5',
                ],
                6 => [
                    'title' => 'The greatest hip-hop songs of all time',
                    'about' => 'BBC Music polled over 100 critics in 15 countries to find the best hip-hop song ever',
                    'body' => ' Text text text text text 6',
                ],
            ]
        ],
        'sport' => [
            'list' => [
                7 => [
                    'title' => 'Aphiwe Dyantyi: South Africa wing given four-year ban for doping',
                    'about' => 'Dyantyi has been given a four-year ban after positive for performance-enhancing substances.',
                    'body' => ' Text text text text text 7',
                ],
                8 => [
                    'title' => 'Cristiano Ronaldo has scored 14 goals for Juventus this season',
                    'about' => 'Ronaldo scored two penalties to earn a Serie A victory for Juventus at struggling Genoa.',
                    'body' => ' Text text text text text 8',
                ],
                9 => [
                    'title' => 'Formula 1: There are worse things to be than a billionaire son',
                    'about' => 'For Lance Stroll, money has always been an issue - just never the lack of it.',
                    'body' => ' Text text text text text 9',
                ],
            ]
        ],
    ];

    public function getCategories() {
        $categories = [];
        foreach ($this->news as $category => $item) {
            $categories[$category] = ucfirst($category);
        }
        return $categories;
    }

    public function getByCategory(string $topic) {
        return $this->news[$topic]['list'];
    }

    public function getById(int $newsId) {
        foreach($this->news as $category) {
            foreach ($category['list'] as $id => $item) {
                if ($newsId == $id) {
                    return $item;
                }
            }
        }

        return null;
    }
}
