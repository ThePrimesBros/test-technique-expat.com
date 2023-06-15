<?php

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
            // Handle form submission
            $title = $_POST['title'];
            $content = $_POST['content'];
            $categoryId = $_POST['category_id'];

            // Validate form fields
            $errors = [];

            if (empty($title)) {
                $errors['title'] = 'Title is required';
            }

            if (empty($content)) {
                $errors['content'] = 'Content is required';
            }

            // ... Perform additional validation if needed

            if (!empty($errors)) {
                http_response_code(400);
                echo json_encode(['errors' => $errors]);
                exit;
            }

            // Create the article
            $articleId = $this->articleModel->createArticle($title, $content, $categoryId);

            // Return the appropriate response
            $response = [];

            if ($categoryId) {
                $response['categoryId'] = $categoryId;
            }

            http_response_code(200);
            echo json_encode($response);
            exit;
        } else {
            // Display the create article form
            $categories = new Category();
            $categoryList = $categories->getAllCategories();

            $data = [
                'categories' => $categoryList
            ];

            $content = $this->view->render('article/create', $data);
            $this->view->render('layout', ['content' => $content]);
        }
    }


    public function listAll()
    {
        $articles = $this->articleModel->getAllArticles();
        $this->view->render('article/list', ['articles' => $articles]);
    }

    public function listByCategory($categoryId)
    {
        $articles = $this->articleModel->getArticlesByCategory($categoryId);
        $this->view->render('article/list', ['articles' => $articles]);
    }
}
