<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class salesreturnpart {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function saveclose($key) {
		
        $sql = "UPDATE salesorder SET status=10 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesreturnpart");
        }
        return $this->data;
    }


}
?>
