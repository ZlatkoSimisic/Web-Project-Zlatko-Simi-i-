<?php
require_once 'baseDao.php';

class BookingDao extends BaseDao {
    public function __construct() {
        parent::__construct("Booking");
    }
}
?>
