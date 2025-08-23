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

        public function findByCategory(int $id): array {
            $db = Database::getInstance();

            $query = "SELECT * FROM posts WHERE status = 1 AND category_id = {$id} ORDER BY id DESC";

            $result = $db->query($query);

            return $result->fetchAll();
        }

        public function search(string $search): array {
            $db = Database::getInstance();

            $query = "SELECT * FROM posts WHERE status = 1 AND (title LIKE '%{$search}%' OR `text` LIKE '%{$search}%') ORDER BY id DESC";

            $result = $db->query($query);

            return $result->fetchAll();
        }
    }
?>