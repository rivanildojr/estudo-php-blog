<?php

    namespace system\controllers;

    use system\core\Controller\Controller;
    use system\core\Helpers\Helpers;
    
    use system\model\Post\PostModel;

    class SearchController extends Controller {

        public function __construct() {
            parent::__construct([
                'templates/website/layouts',
                'templates/website/components',
                'templates/website/views/Search',
            ]);
        }

        public function index(): void {
            $search = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (empty($search['search'])) {
                Helpers::redirect(BASE_URL);
            }

            $posts = new PostModel();
            $allPosts = $posts->search($search['search']);

            echo $this->template->render('index.html', [
                'title' => 'Resultados da Busca',
                'subtitle' => 'Posts encontrados',
                'posts' => $allPosts
            ]);
        }
    }