<?php
require_once 'baseService.php';
require_once __DIR__.'/../UserDao.php';

class userService extends baseService {

    public function __construct() {
        parent::__construct(new UserDao());
    }

    // Business logic for registration
    public function registerUser($data) {

        if (!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }

        // Check if email exists
        if ($this->dao->getByEmail($data['Email'])) {
            throw new Exception("Email already in use.");
        }

        // Password hashing
        if (!isset($data['password_hash'])) {
            throw new Exception("Password is required.");
        }

        $data['password_hash'] = password_hash($data['password_hash'], PASSWORD_BCRYPT);

        return $this->dao->insert($data);
    }
}
?>
