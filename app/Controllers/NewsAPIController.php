<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use App\Models\NewsDisplayModel;
use DateTime;

class NewsAPIController extends BaseController
{
    private $newsDisplayModel;
    private $articleModel;
    public function __construct() {
        $this->newsDisplayModel = new NewsDisplayModel();
        $this->articleModel = new ArticleModel();
    }

    public function loadAPI($topic)
    {
        $API_KEY = '1c8166f1a7c54143852f349d6708cd89';

        $q = ($topic);

        $url = 'https://newsapi.org/v2/everything?q=' . $q . '&language=pt&sortBy=publishedAt&apiKey=' . $API_KEY;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'User-Agent: PHP'
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        $articles = $data['articles'];

        return $articles;
    }

    public function loadAPITrending()
    {
        $API_KEY = '1c8166f1a7c54143852f349d6708cd89';

        $q = "energia";

        $url = 'https://newsapi.org/v2/everything?q=' . $q . '&language=pt&sortBy=publishedAt&apiKey=' . $API_KEY;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'User-Agent: PHP'
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        $articles = $data['articles'];

        return $articles;
    }


    public function createCard($topic, $trending = false)
    {
        if ($trending) {
            $articles = $this->loadAPITrending();
        } else {
            $articles = $this->loadAPI($topic);
        }

        $limit = 20;
        for ($i = 0; $i < $limit; $i++) {
            $article = $articles[$i];

            $title = $article['title'];
            $description = $article['description'];
            $url = $article['url'];
            $urlToImage = $article['urlToImage'];
            $source = $article['source']['name'];

            $dateOriginal = new DateTime($article['publishedAt']);
            $dateHoje = new DateTime();
            $diff = $dateOriginal->diff($dateHoje);
            $total = $diff->h + ($diff->days * 24);

            if ($total > 24) {
                $postTime = sprintf('%dd%dh', $diff->days, $diff->h);
            } elseif ($total == 24) {
                $postTime = sprintf('%dd', $diff->days);
            } else {
                $postTime = sprintf('%dh', $total);
            }

            // Se tiver faltando o titulo ou se o titulo for '[Removed]' nem exibi
            if (empty($title) || $title == '[Removed]') {
                // Não exibir
                continue;
            }

            $titleLimit = 60;
            if (strlen($title) > $titleLimit) {
                $lastSpace = strrpos(substr($title, 0, $titleLimit), ' ');

                if ($lastSpace !== false) {
                    $title = substr($title, 0, $lastSpace) . '...';
                } else {
                    $title = substr($title, 0, $titleLimit) . '...';
                }
            }

            $descriptionLimit = 115;
            if (strlen($description) > $descriptionLimit) {
                $lastSpace = strrpos(substr($description, 0, $descriptionLimit), ' ');

                if ($lastSpace !== false) {
                    $description = substr($description, 0, $lastSpace) . '...';
                } else {
                    $description = substr($description, 0, $descriptionLimit) . '...';
                }
            }

            $card = view('components/ui/Card.php', [
                'id' => $i,
                'title' => $title,
                'description' => $description,
                'url' => $url,
                'imgURL' => $urlToImage,
                'source' => $source,
                'topic' => $topic,
                'date' => $postTime,
            ]);

            $cards[] = $card;
        }

        return $cards;
    }

    public function createCarrousel($topic, $trending = false)
    {   
        if ($trending) {
            $articles = $this->loadAPITrending();
        } else {
            $articles = $this->loadAPI($topic);
        }
    
        $limit = 20;
        $carrouselItems = [];
    
        for ($i = 0; $i < $limit; $i++) {
            $article = $articles[$i];
    
            $title = $article['title'];
            $description = $article['description'];
            $url = $article['url'];
            $urlToImage = $article['urlToImage'];
            $source = $article['source']['name'];
    
            // Se tiver faltando o título ou se o título for '[Removed]', não exibi
            if (empty($title) || $title == '[Removed]') {
                continue;
            }
    
            $titleLimit = 60;
            if (strlen($title) > $titleLimit) {
                $lastSpace = strrpos(substr($title, 0, $titleLimit), ' ');
    
                if ($lastSpace !== false) {
                    $title = substr($title, 0, $lastSpace) . '...';
                } else {
                    $title = substr($title, 0, $titleLimit) . '...';
                }
            }
    
            $descriptionLimit = 115;
            if (strlen($description) > $descriptionLimit) {
                $lastSpace = strrpos(substr($description, 0, $descriptionLimit), ' ');
    
                if ($lastSpace !== false) {
                    $description = substr($description, 0, $lastSpace) . '...';
                } else {
                    $description = substr($description, 0, $descriptionLimit) . '...';
                }
            }
    
            $active = $i == 0 ? 'active' : ''; 
            $card = view('components/ui/CarrouselItem.php', [
                'title' => $title,
                'url' => $url,
                'imgURL' => $urlToImage,
                'active' => $active,
                'source' => $source,
            ]);
            $carrouselItems[] = $card;
        }
    
        // Agora, após o loop, você pode imprimir os itens do carrossel
        //dd($carrouselItems);
    
  
        $carrossel = view('components/ui/Carrousel.php', [
            'carrouselItems' => $carrouselItems,
        ]);
    
        return $carrossel;
    }
    
}
