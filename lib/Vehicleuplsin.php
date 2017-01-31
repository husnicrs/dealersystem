<?php
include_once 'Database.php';
class vehicleuplsin {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function showvehicleuplsin() {
        $sql = "SELECT
				COUNT(CASE WHEN vehicle.vehlicetype ='' THEN 1 ELSE 1 END) AS countnull
				FROM
				vehicleupload
				LEFT JOIN vehicle ON vehicleupload.vehicletype = vehicle.vehlicetype
				WHERE vehicle.vehlicetype='' OR vehicle.vehlicetype IS NULL";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }

}
?>
