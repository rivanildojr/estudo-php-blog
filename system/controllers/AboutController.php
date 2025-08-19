<?php

    namespace system\controllers;

    use system\core\Controller\Controller;

    class AboutController extends Controller {

        public function __construct() {
            parent::__construct([
                'templates/website/layouts',
                'templates/website/components',
                'templates/website/views/About'
            ]);
        }

        public function index(): void {
            echo $this->template->render('index.html', [
                'title' => 'Sobre nós',
                'content' => 'Esta é a página sobre nós do nosso site.'
            ]);
        }
    }