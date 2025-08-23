<?php

    namespace system\support\Template;

    use Twig\Lexer;
    use system\core\Helpers\Helpers;

    class Template {
        private \Twig\Environment $twig;

        public function __construct(array $directories) {
            $loader = new \Twig\Loader\FilesystemLoader($directories);

            $this->twig = new \Twig\Environment($loader);

            $lexer = new Lexer($this->twig, [
                $this->helpers()
            ]);

            $this->twig->setLexer($lexer);
        }

        public function render(string $view, array $data = []): string {
            return $this->twig->render($view, $data);
        }

        public function helpers(): void {
            array(
                $this->twig->addFunction(
                    new \Twig\TwigFunction('url', function(string $url = null) {
                        return Helpers::url($url);
                    })
                ),
                $this->twig->addFunction(
                    new \Twig\TwigFunction('greeting', function() {
                        return Helpers::greeting();
                    })
                ),
                $this->twig->addFunction(
                    new \Twig\TwigFunction('resumeText', function(string $text, int $limit, string $continue = '...') {
                        return Helpers::resumeText($text, $limit, $continue);
                    })
                )
            );
        }

        public function addGlobal(string $name, $value): void {
            $this->twig->addGlobal($name, $value);
        }
    }