<?php

    namespace system\core\Controller;

    class Controller {
        public function __construct(string $theme = null) {
            echo $theme;
        }

        public function index() {
            // Método padrão para a ação index
        }
    }