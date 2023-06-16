<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    protected $articleModel;

    public function __construct()
    {
        parent::__construct();
        $this->articleModel = new Article();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $categoryId = $_POST['category_id'];

            $errors = [];

            if (empty($title)) {
                $errors['title'] = 'Title is required';
            }

            if (empty($content)) {
                $errors['content'] = 'Content is required';
            }

            if (!empty($errors)) {
                http_response_code(400);
                echo json_encode(['errors' => $errors]);
                exit;
            }

            $articleId = $this->articleModel->createArticle($title, $content, $categoryId);

            if ($articleId) {
                header("Location: /articles");
                exit;
            } else {
                echo "An Error as occured.";
            }
        } else {
            $categories = new Category();
            $categoryList = $categories->getAllCategory();

            $data = [
                'categories' => $categoryList
            ];

            $this->view->render('create', $data);
        }
    }


    public function listAll()
    {
        $articles = $this->articleModel->getAllArticles();
        $this->view->render('list', ['articles' => $articles]);
    }

    public function listByCategory($categoryId)
    {
        $articles = $this->articleModel->getArticlesByCategory($categoryId);
        $this->view->render('list', ['articles' => $articles]);
    }
}
