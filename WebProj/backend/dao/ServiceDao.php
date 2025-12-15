<?php

require_once 'BaseDao.php';

class Service extends BaseDao {
    public function __construct() {
        parent::__construct("services");
    }

    public function getById($id) {
        $stmt = $this->connection->prepare("SELECT * FROM services WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
}

?>
