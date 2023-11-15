<?php

namespace App\Controllers;

use App\Controllers\NewsAPIController;

class PagesController extends BaseController
{
    public function home()
    {
        $title = 'Home';
        $components = [
            'header' => view('components/Header.php', ['title' => $title]),
            'navbar' => view('components/Navbar.php'),
            'footer' => view('components/Footer.php'),
        ];

        echo view('template/index.php', [
            'components' => $components,
        ]);
    }

    public function specific($titleProp)
    {
        // Use o cache para obter ou armazenar os resultados da API por 5 minutos
        $cacheKey = 'news_' . $titleProp;
        $cache = \Config\Services::cache();

        $newsData = $cache->get($cacheKey);
        
        $title = fromSlug($titleProp);

        if (empty($newsData)) {
            // Se não estiver em cache, faça a solicitação à API
            $newsAPI = new NewsAPIController();
            $cards = $newsAPI->createCard($titleProp);
            $carrousel = $newsAPI->createCarrousel($titleProp);

            // Armazene os resultados em cache por 5 minutos
            $cache->save($cacheKey, compact('cards', 'carrousel'), 300);
        } else {
            // Se estiver em cache, use os dados armazenados
            $cards = $newsData['cards'];
            $carrousel = $newsData['carrousel'];
        }

        $components = [
            'header' => view('components/Header.php', ['title' => $title]),
            'navbar' => view('components/Navbar.php'),
            'footer' => view('components/Footer.php'),
        ];

        echo view('template/topic.php', [
            'components' => $components,
            'cards' => $cards,
            'topic' => $title,
            'carrousel' => $carrousel,
        ]);
    }
}
