<?php 

    namespace system\controllers;

    use system\core\Controller\Controller;
    
    class NotFoundController extends Controller {

        public function __construct() {
            parent::__construct([
                'templates/website/layouts',
                'templates/website/components',
                'templates/website/views/NotFound',
            ]);
        }

        public function index(): void {
            echo $this->template->render('index.html', [
                'title' => 'Página Não encontrada',
                'subtitle' => 'Desculpe, a página que você está procurando não existe.'
            ]);
        }
    }
