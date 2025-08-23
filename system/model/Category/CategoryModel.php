<?php 

    namespace system\model\Category;

    use system\core\Database\Database;

    class CategoryModel {

        public function findAll(): array {
            $db = Database::getInstance();

            $query = "SELECT * FROM categories WHERE status = 1 ORDER BY id DESC";

            $result = $db->query($query);

            return $result->fetchAll();
        }

        public function find(int $id = null): bool|object {
            $db = Database::getInstance();

            $query = "SELECT * FROM categories WHERE status = 1 AND id = {$id}";

            $result = $db->query($query);

            return $result->fetch();
        }
    }
?>