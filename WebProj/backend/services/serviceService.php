<?php
require_once 'baseService.php';
require_once __DIR__.'/../ServiceDao.php';

class serviceService extends baseService {

    public function __construct() {
        parent::__construct(new ServiceDao());
    }

    public function create($data) {

        if ($data['Price'] < 0) {
            throw new Exception("Service price cannot be negative.");
        }

        // Service must have a name
        if (strlen(trim($data['Name'])) < 2) {
            throw new Exception("Service name is too short.");
        }

        // If ToolID is provided, ensure Tool exists
        if (!empty($data['ToolID']) && !$this->dao->toolExists($data['ToolID'])) {
            throw new Exception("Referenced tool does not exist.");
        }

        return parent::create($data);
    }
}
?>
