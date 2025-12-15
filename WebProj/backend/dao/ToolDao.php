<?php

require_once 'BaseDao.php';

class ToolDao extends BaseDao {
    public function __construct() {
        parent::__construct("tools");
    }

    public function getById($id) {
        $stmt = $this->connection->prepare("SELECT * FROM tools WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
}

?>
