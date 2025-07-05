<?php
namespace App\Cells;

use CodeIgniter\View\Cells\Cell;
use App\Models\ArticleModel;

class LatestArticles extends Cell
{
    public function display()
    {
        $model = new ArticleModel();
        $articles = $model->orderBy('created_at', 'DESC')->findAll(3);

        return view('partials/latest_articles', ['latestArticles' => $articles]);
    }
}
