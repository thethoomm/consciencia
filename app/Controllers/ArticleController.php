<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use DateTime;

class ArticleController extends BaseController
{
    private $articleModel;
    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        //
    }

    public function deleteOldArticles()
    {
        $articleModel = new ArticleModel();

        $articles = $articleModel->findAll();

        foreach ($articles as $article) {
            $date = new DateTime($article['created_at']);
            $date->modify('+7 day');
            $now = new DateTime();

            if ($date < $now) {
                $articleModel->delete($article['id']);
            }
        }
    }
}
