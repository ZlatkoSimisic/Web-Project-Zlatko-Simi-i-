<?php

require_once 'BaseDao.php';

class BookingDao extends BaseDao {
    public function __construct() {
        parent::__construct("bookings");
    }

    public function getById($id) {
        $stmt = $this->connection->prepare("SELECT * FROM booking WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
}

?>
