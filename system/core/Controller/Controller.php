<?php

    namespace system\core\Controller;

    use system\support\Template\Template;

    class Controller {
        protected Template $template;

        public function __construct(string $directory) {
            $this->template = new Template($directory);
        }
    }