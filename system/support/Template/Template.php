<?php

    namespace system\support\Template;

    class Template {
        private \Twig\Environment $twig;

        public function __construct(string $directory) {
            $loader = new \Twig\Loader\FilesystemLoader($directory);

            $this->twig = new \Twig\Environment($loader);
        }

        public function render(string $view, array $data = []): string {
            return $this->twig->render($view, $data);
        }
    }