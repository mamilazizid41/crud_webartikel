<?php
namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table      = 'articles';
    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'content', 'created_at', 'updated_at', 'status'];

    protected $useTimestamps = true;
}
