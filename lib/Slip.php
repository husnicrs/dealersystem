<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class slip {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }

    function showSlip($submodule) {
        $sql = "SELECT
				slip.idslip,
				slip.slipname,
				slip.module,
				slip.subnavmenuid,
				subnavmenu.submodule
				FROM
				slip
				INNER JOIN subnavmenu ON slip.subnavmenuid = subnavmenu.idsubnavmenu
				WHERE subnavmenu.submodule=:submodule
				ORDER BY slip.sequencenumber ASC";
        $arrData = array(':submodule' => $submodule);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
}
?>
