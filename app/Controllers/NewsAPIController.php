<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;

class NewsAPIController extends BaseController
{

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


    public function createCard($topic)
    {
        $articles = $this->loadAPI($topic);

        $limit = 10;
        for ($i = 0; $i < $limit; $i++) {
            $article = $articles[$i];

            $title = $article['title'];
            $description = $article['description'];
            $url = $article['url'];
            $urlToImage = $article['urlToImage'];
            $source = $article['source']['name'];

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
                'title' => $title,
                'description' => $description,
                'url' => $url,
                'imgURL' => $urlToImage,
                'source' => $source,
                'topic' => $topic,
            ]);

            $cards[] = $card;
        }

        return $cards;
    }

    public function createCarrousel($topic)
    {   
        $articles = $this->loadAPI($topic);
    
        $limit = 60;
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
        // dd($carrouselItems);
    
  
        $carrossel = view('components/ui/Carrousel.php', [
            'carrouselItems' => $carrouselItems,
        ]);
    
        return $carrossel;
    }
    
}
