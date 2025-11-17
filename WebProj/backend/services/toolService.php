<?php
require_once 'baseService.php';
require_once __DIR__.'/../ToolDao.php';

class toolService extends baseService {

    public function __construct() {
        parent::__construct(new ToolDao());
    }

    public function create($data) {

        if (strlen(trim($data['Name'])) < 2) {
            throw new Exception("Tool name is too short.");
        }

        if (strlen(trim($data['Manufacturer'])) < 2) {
            throw new Exception("Tool manufacturer is too short.");
        }

        // Validate that assigned service exists
        if (!empty($data['ServiceID']) && !$this->dao->serviceExists($data['ServiceID'])) {
            throw new Exception("Referenced service does not exist.");
        }

        return parent::create($data);
    }
}
?>
