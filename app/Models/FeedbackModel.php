<?php
// app/Models/FeedbackModel.php
namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'id';
    protected $allowedFields = ['article_id', 'name', 'email', 'comment'];

}
