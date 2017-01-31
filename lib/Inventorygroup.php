<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class inventorygroup {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function showDetail($key) {
        $sql = "SELECT
				inventorygroup.idinventorygroup,
				inventorygroup.inventorygroupname,
				inventorygroup.`status`
				FROM
				inventorygroup
				WHERE inventorygroup.idinventorygroup=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }


}
?>
