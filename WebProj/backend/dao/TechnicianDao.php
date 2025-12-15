<?php

require_once 'BaseDao.php';

class TechnicianDao extends BaseDao {
    public function __construct() {
        parent::__construct("technicians");
    }

    public function getByEmail($email) {
        $stmt = $this->connection->prepare("SELECT * FROM technicians WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }
}

?>

