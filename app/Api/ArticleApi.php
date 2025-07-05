<?php
namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ArticleModel;

class ArticleApi extends ResourceController {
    protected $modelName = 'App\\Models\\ArticleModel';
    protected $format = 'json';
}