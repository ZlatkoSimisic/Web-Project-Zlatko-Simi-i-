<?php
require_once 'config.php';

class BaseDao {
    protected $connection;
    protected $table;

    public function __construct($table) {
        $this->connection = Database::connect();
        $this->table = $table;
    }

    public function create($data) {
        $keys = array_keys($data);
        $fields = implode(",", $keys);
        $placeholders = ":" . implode(", :", $keys);

        $sql = "INSERT INTO {$this->table} ($fields) VALUES ($placeholders)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
        return $this->connection->lastInsertId();
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($idField, $id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$idField} = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($idField, $id, $data) {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = :$key";
        }
        $setStr = implode(", ", $set);

        $sql = "UPDATE {$this->table} SET {$setStr} WHERE {$idField} = :id";
        $stmt = $this->connection->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($idField, $id) {
        $sql = "DELETE FROM {$this->table} WHERE {$idField} = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
