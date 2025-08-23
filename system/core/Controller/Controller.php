<?php

    namespace system\core\Controller;

    use system\support\Template\Template;

    use system\model\Category\CategoryModel;

    class Controller {
        protected Template $template;

        public function __construct(array $directories) {
            $this->template = new Template($directories);

            $this->loadCategories();
        }

        private function loadCategories(): void {
            $categories = new CategoryModel();
            $allCategories = $categories->findAll();

            $this->template->addGlobal('categories', $allCategories);
        }
    }