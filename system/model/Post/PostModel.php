<?php 

    namespace system\model\Post;

    use system\core\Database\Database;

    class PostModel {

        public function findAll(): array {
            $db = Database::getInstance();

            $query = "SELECT * FROM posts WHERE status = 1 ORDER BY id DESC";

            $result = $db->query($query);

            return $result->fetchAll();
        }

        public function find(int $id = null): bool|object {
            $db = Database::getInstance();

            $query = "SELECT * FROM posts WHERE status = 1 AND id = {$id}";

            $result = $db->query($query);

            return $result->fetch();
        }
    }
?>