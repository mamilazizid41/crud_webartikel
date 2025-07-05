<?php
namespace App\Controllers;
use App\Models\ArticleModel;
use CodeIgniter\Controller;
use App\Models\FeedbackModel;
use CodeIgniter\Pager\Pager;


class ArticleController extends Controller {
    protected $articleModel;

    public function __construct()
{
    helper(['form', 'url']);
    $this->articleModel = new \App\Models\ArticleModel();

    // Allow public access to certain methods
    $uri = service('router')->methodName();
    $publicMethods = ['publicIndex', 'read'];

    if (!in_array($uri, $publicMethods) && !session()->get('logged_in')) {
        header('Location: /login');
        exit;
    }
}


    public function publicIndex()
{
    $articleModel = new ArticleModel();
    $query = $articleModel->where('status', 'published');

    $data = [
        'articles' => $query->orderBy('created_at', 'DESC')->paginate(10, 'articles'),
        'pager'    => $articleModel->pager,
        'title'    => 'All Articles'
    ];

    return view('articles/public_index', $data);
}


    public function index() {
        $feedbackModel = new \App\Models\FeedbackModel();
        $db = \Config\Database::connect();
        $search = $this->request->getGet('search');
        $query = $this->articleModel;
        if ($search) $query = $query->like('title', $search);
        $data['articles'] = $this->articleModel->orderBy('created_at', 'DESC')->paginate(5, 'articles');
        $data['pager'] = $this->articleModel->pager;
        $data["totalArticles"] = $this->articleModel->countAll();
        $data["totalFeedback"] = $db->table('feedback')
            ->join('articles', 'articles.id = feedback.article_id')
            ->countAllResults();
        
        return view('articles/index', $data);
    }

    public function create() {
        return view('articles/create');
    }

    public function store() {
        $this->articleModel->save([
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'status'  => $this->request->getPost('status'),
            'user_id' => session()->get('user_id')
        ]);
        return redirect()->to('/dashboard')->with('success', 'Article created successfully!');


    }

    public function edit($id) {
        $data['article'] = $this->articleModel->find($id);
        return view('articles/edit', $data);
    }

    public function update($id) {
        $this->articleModel->update($id, [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'status'  => $this->request->getPost('status'),
            'user_id' => session()->get('user_id')
        ]);
        return redirect()->to('/dashboard')->with('success', 'Article updated successfully!');

    }

    public function delete($id) {
        $this->articleModel->delete($id);
        return redirect()->to('/dashboard')->with('success', 'Article deleted!');

    }
    public function read($id)
{
    $articleModel = new ArticleModel();
    $feedbackModel = new FeedbackModel();

    $article = $articleModel->find($id);

    if (!$article) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Article not found');
    }

    // Get feedback for this article
    $feedback = $feedbackModel->where('article_id', $id)->orderBy('created_at', 'DESC')->findAll();

    return view('articles/read', [
        'article' => $article,
        'feedback' => $feedback
    ]);
}



}
