<?php
require_once 'baseService.php';
require_once __DIR__.'/../BookingDao.php';

class bookingService extends baseService {

    public function __construct() {
        parent::__construct(new BookingDao());
    }

    public function create($data) {

        // Booking must reference an existing service
        if (!$this->dao->serviceExists($data['ServiceID'])) {
            throw new Exception("Service does not exist.");
        }

        // Booking must reference an existing user
        if (!$this->dao->userExists($data['UserID'])) {
            throw new Exception("User does not exist.");
        }

        // Date must be today or future
        if (strtotime($data['DateAndTime']) < time()) {
            throw new Exception("Booking date cannot be in the past.");
        }

        return parent::create($data);
    }
}
?>
