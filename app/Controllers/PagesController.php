<?php

namespace App\Controllers;

use App\Controllers\NewsAPIController;

class PagesController extends BaseController
{
    public function home()
    {
        $cacheKey = 'news_trending';
        $cache = \Config\Services::cache();

        $newsData = $cache->get($cacheKey);

        if (empty($newsData)) {
            $newsAPI = new NewsAPIController();
            $cards = $newsAPI->createCard("", true);
            $carrousel = $newsAPI->createCarrousel("", true);

            // Armazene os resultados em cache por N minutos
            $minutes = 0.15;

            $cache->save($cacheKey, compact('cards', 'carrousel'), $minutes * 60);

        } else {
            $cards = $newsData['cards'];
            $carrousel = $newsData['carrousel'];
        }

        $weatherAPI = new WeatherAPIController();
        $weather = $weatherAPI->getCityWeather();

        $title = 'Home';
        $components = [
            'header' => view('components/Header.php', ['title' => $title]),
            'navbar' => view('components/Navbar.php', ['weather' => $weather]),
            'footer' => view('components/Footer.php'),
        ];


        echo view('template/index.php', [
            'components' => $components,
            'cards' => $cards,
            'carrousel' => $carrousel,
        ]);
    }

    public function specific($titleProp)
    {
        $cacheKey = 'news_' . $titleProp;
        $cache = \Config\Services::cache();

        $newsData = $cache->get($cacheKey);

        $title = fromSlug($titleProp);

        if (empty($newsData)) {
            $newsAPI = new NewsAPIController();
            $cards = $newsAPI->createCard($titleProp);
            $carrousel = $newsAPI->createCarrousel($titleProp);

            // Armazene os resultados em cache por N minutos
            $minutes = 2;

            $cache->save($cacheKey, compact('cards', 'carrousel'), $minutes * 60);

        } else {
            $cards = $newsData['cards'];
            $carrousel = $newsData['carrousel'];
        }

        $weatherAPI = new WeatherAPIController();
        $weather = $weatherAPI->getCityWeather();

        $components = [
            'header' => view('components/Header.php', ['title' => $title]),
            'navbar' => view('components/Navbar.php', ['weather' => $weather]),
            'footer' => view('components/Footer.php'),
        ];

        echo view('template/topic.php', [
            'components' => $components,
            'cards' => $cards,
            'topic' => $title,
            'carrousel' => $carrousel,
        ]);
    }

    public function article($title) {

        $weatherAPI = new WeatherAPIController();
        $weather = $weatherAPI->getCityWeather();

        $components = [
            'header' => view('components/Header.php', ['title' => $title]),
            'navbar' => view('components/Navbar.php', ['weather' => $weather]),
            'footer' => view('components/Footer.php'),
        ];

        echo view('template/article.php', [
            'components' => $components,
            'title' => $title,
        ]);
    }
}
