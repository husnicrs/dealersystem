<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class vehlicemodelgroup {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function showDetail($key) {
        $sql = "SELECT
				vehlicemodelgroup.idvehlicemodelgroup,
				vehlicemodelgroup.vehlicemodelgroupname
				FROM
				vehlicemodelgroup
				WHERE vehlicemodelgroup.idvehlicemodelgroup=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }


}
?>
