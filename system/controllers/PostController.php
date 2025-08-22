<?php

    namespace system\controllers;

    use system\core\Controller\Controller;
    use system\model\Post\PostModel;
    use system\core\Helpers\Helpers;

    class PostController extends Controller {

        public function __construct() {
            parent::__construct([
                'templates/website/layouts',
                'templates/website/components',
                'templates/website/views/Post',
            ]);
        }

        public function index(int $id): void {
            $posts = new PostModel();
            $post = $posts->find($id);

            if (empty($post)) {
                Helpers::redirect('404');
            }

            echo $this->template->render('index.html', [
                'post' => $post,
            ]);
        }
    }