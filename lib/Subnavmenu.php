<?php
include_once 'Database.php';
class subnavmenu {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function showsubnavmenu($modulename) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				subnavmenu.idsubnavmenu,
				subnavmenu.subnavmenuname,
				navmenu.navmenuname,
				subnavmenu.submodule
				FROM
				subnavmenu
				INNER JOIN navmenu ON subnavmenu.navmenuid = navmenu.idnavmenu WHERE subnavmenu.submodule=:modulename";
        $arrData = array(':modulename' => $modulename);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
	
	function showfilter() {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				DATE_FORMAT(users.begindate,'%d/%m/%Y') AS fbegindate,
				DATE_FORMAT(users.enddate,'%d/%m/%Y') AS fenddate,
				users.modelfilter,
				users.typefilter,
				users.leasingfilter,
				users.billfilter,
				users.channelfilter,
				users.statusstnk,
				CASE WHEN users.billfilter = 1 THEN 'Y' ELSE CASE WHEN users.billfilter = 2 THEN 'N' END END AS billfiltername,
				CASE WHEN DATE_FORMAT(users.billdatefilter,'%d/%m/%Y') = '01/01/1970' OR DATE_FORMAT(users.billdatefilter,'%d/%m/%Y') = '00/00/0000' THEN '' ELSE DATE_FORMAT(users.billdatefilter,'%d/%m/%Y') END AS billdatefilter
				FROM
				users
				WHERE 
				users.username='".$user."'";
		$arrData = array();
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
}
?>
