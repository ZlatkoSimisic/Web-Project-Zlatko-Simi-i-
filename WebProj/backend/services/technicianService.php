<?php
require_once 'baseService.php';
require_once __DIR__.'/../TechnicianDao.php';

class technicianService extends baseService {

    public function __construct() {
        parent::__construct(new TechnicianDao());
    }

    public function create($data) {

        $validSkills = ['Mechanic','Electrician','Painter','Inspector','Other'];

        if (!in_array($data['Skills'], $validSkills)) {
            throw new Exception("Invalid technician skill type.");
        }

        if (!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }

        // Technician must be at least 18
        $age = date_diff(date_create($data['Birthday']), date_create('today'))->y;
        if ($age < 18) {
            throw new Exception("Technician must be at least 18 years old.");
        }

        return parent::create($data);
    }
}
?>
