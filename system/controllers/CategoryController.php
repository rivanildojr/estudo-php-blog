<?php

    namespace system\controllers;

    use system\core\Controller\Controller;
    use system\core\Helpers\Helpers;
    
    use system\model\Post\PostModel;
    use system\model\Category\CategoryModel;

    class CategoryController extends Controller {

        public function __construct() {
            parent::__construct([
                'templates/website/layouts',
                'templates/website/components',
                'templates/website/views/Category',
            ]);
        }

        public function index(int $id): void {
            $categories = new CategoryModel();
            $category = $categories->find($id);

            if (empty($category)) {
                Helpers::redirect('404');
            }

            $posts = new PostModel();
            $allPosts = $posts->findByCategory($id);

            echo $this->template->render('index.html', [
                'title' => $category->title,
                'subtitle' => "Post in category: {$category->title}",
                'posts' => $allPosts
            ]);
        }
    }