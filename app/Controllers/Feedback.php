<?php
// app/Controllers/Feedback.php
namespace App\Controllers;
use App\Models\FeedbackModel;
use App\Models\ArticleModel;

class Feedback extends BaseController
{
    protected $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
        // Allow public access to certain methods
    $uri = service('router')->methodName();
    $publicMethods = [];

    if (!in_array($uri, $publicMethods) && !session()->get('logged_in')) {
        header('Location: /login');
        exit;
    }
    }
    public function store($articleId)
{
    $validation = \Config\Services::validation();

    $rules = [
        'name'    => 'required|min_length[3]',
        'email'   => 'required|valid_email',
        'comment' => 'required|min_length[5]'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()
                         ->withInput()
                         ->with('errors', $validation->getErrors());
    }

    $this->feedbackModel->insert([
        'article_id' => $articleId,
        'name'       => $this->request->getPost('name'),
        'email'      => $this->request->getPost('email'),
        'comment'    => $this->request->getPost('comment'),
    ]);

    return redirect()->back()->with('success', 'Thank you for your feedback!');
}



    public function index()
    {
        $model = new FeedbackModel();
        $articleModel = new ArticleModel();

        $feedback = $model
    ->select('feedback.*, articles.title as article_title, articles.status as article_status')
    ->join('articles', 'articles.id = feedback.article_id')
    ->findAll();


        return view('feedback/index', ['feedback' => $feedback]);
    }
}
