<?php

    namespace system\core\Controller;

    use system\support\Template\Template;

    class Controller {
        protected Template $template;

        public function __construct(array $directories) {
            $this->template = new Template($directories);
        }
    }