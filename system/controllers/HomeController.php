<?php 

    namespace system\controllers;

    use system\core\Controller\Controller;

    class HomeController extends Controller {

        public function __construct() {
            parent::__construct('templates/website/views');
        }

        public function index(): void {
            echo $this->template->render('index.html', [
                'title' => 'Home',
                'subtitle' => 'Bem-vindo ao nosso site!'
            ]);
        }
    }
