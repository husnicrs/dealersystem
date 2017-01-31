<?php
include_once 'Database.php';
class navmenu {
    private $db ='';
    private $data;
    private $tabel = 'navmenu';
    public function __construct(){
        $this->db = new Database();
    }
	function showmaxgroupconcat() {
        $sql = "SET SESSION group_concat_max_len = 1000000;";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	
    function show($user){
		$user=$_SESSION['uname'];
        $sql = "SELECT
				navmenu.idnavmenu,
				navmenu.navmenuname,
				navmenu.modulname,
				navmenu.tabmenuid,
				navmenu.userpositionid,
				navmenu.sequencenumber,
				navmenu.iclass,
				navmenu.span,
				navmenu.spanclass,
				navmenu.liclass,
				navmenu.datatoggle,
				GROUP_CONCAT(subnavmenu.idsubnavmenu) AS idsubnavmenu,
				GROUP_CONCAT(CONCAT('<li><a href=',subnavmenu.specialcharacter,'?mod=',subnavmenu.submodule,subnavmenu.specialcharacter,'>',subnavmenu.subnavmenuname,'</a></li>')  ORDER BY subnavmenu.sequencenumber) AS subnavmenuname,
				navmenu.ulclass AS ulclass,
				navmenu.role AS role,
				userauthorized.userid
				FROM
				navmenu
				LEFT JOIN subnavmenu ON navmenu.idnavmenu = subnavmenu.navmenuid
				INNER JOIN userauthorized ON subnavmenu.idsubnavmenu = userauthorized.menuid
				INNER JOIN users ON userauthorized.userid = users.iduser
				WHERE users.username=:user
				GROUP BY  
				navmenu.idnavmenu,
				navmenu.navmenuname,
				navmenu.modulname,
				navmenu.tabmenuid,
				navmenu.userpositionid,
				navmenu.sequencenumber,
				navmenu.iclass,
				navmenu.span,
				navmenu.spanclass,
				navmenu.ulclass,
				navmenu.liclass,
				navmenu.role,
				navmenu.datatoggle
				ORDER BY
				navmenu.sequencenumber, subnavmenu.sequencenumber ASC";
        $arrData = array(':user'=>$user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function showcombo(){
        $sql = "SELECT
				subnavmenu.idsubnavmenu,
				subnavmenu.subnavmenuname,
				subnavmenu.navmenuid,
				subnavmenu.sequencenumber,
				subnavmenu.submodule,
				subnavmenu.specialcharacter
				FROM
				subnavmenu";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }

	function showedit($modulename){
        $sql = "SELECT
				navmenu.idnavmenu,
				navmenu.navmenuname,
				navmenu.modulname,
				navmenu.tabmenuid,
				navmenu.userpositionid,
				navmenu.sequencenumber,
				navmenu.iclass,
				navmenu.span,
				navmenu.spanclass,
				navmenu.liclass,
				CASE WHEN navmenu.liclass='dropdown' THEN 'Dropdown' ELSE 'Standard' END AS liclassname,
				navmenu.datatoggle,
				navmenu.role AS role,
				navmenu.ulclass
				FROM
				navmenu
				WHERE navmenu.modulname=:modulename";
        $arrData = array(':modulename' => $modulename);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
	function shownavedit($modulename){
        $sql = "SELECT
				navmenu.modulname AS modkey
				FROM
				navmenu
				INNER JOIN subnavmenu ON navmenu.idnavmenu =subnavmenu.navmenuid
				WHERE subnavmenu.submodule=:modulename";
        $arrData = array(':modulename' => $modulename);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
	function showsubnavedit($modulename){
        $sql = "SELECT
				navmenu.idnavmenu,
				navmenu.navmenuname,
				navmenu.modulname,
				navmenu.tabmenuid,
				navmenu.userpositionid,
				navmenu.sequencenumber,
				navmenu.iclass,
				navmenu.span,
				navmenu.spanclass,
				navmenu.liclass,
				navmenu.datatoggle,
				navmenu.role AS role,
				navmenu.ulclass,
				subnavmenu.subnavmenuname,
				subnavmenu.submodule,
				subnavmenu.sequencenumber
				FROM
				navmenu
				INNER JOIN subnavmenu ON navmenu.idnavmenu =subnavmenu.navmenuid
				WHERE navmenu.modulname=:modulename";
        $arrData = array(':modulename' => $modulename);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

    function showlistclass() {
        $sql = "SELECT 'dropdown' AS id, 'Dropdown' AS listclass
				UNION ALL
				SELECT '' AS id, 'Standard' AS listclass";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showspanclass() {
        $sql = "SELECT 'sr-only' AS spanclass
				UNION ALL
				SELECT 'label label-success' AS spanclass
				UNION ALL
				SELECT 'label label-default' AS spanclass
				UNION ALL
				SELECT 'label label-warning' AS spanclass
				UNION ALL
				SELECT 'label label-danger' AS spanclass
				UNION ALL
				SELECT 'caret' AS spanclass";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showicon() {
        $sql = "SELECT * FROM icon";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function shownavmenu() {
        $sql = "SELECT * FROM navmenu";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function notifcount($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				IFNULL(COUNT(notification.idnotification),0) AS notificationcount
				FROM
				notification
				INNER JOIN notificationstatus ON notification.idnotification = notificationstatus.notificationid
				INNER JOIN users ON notificationstatus.username = users.username
				WHERE notificationstatus.`status`=0 AND notificationstatus.username=:user";
        $arrData = array(':user'=>$user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function shownotif($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				notification.idnotification,
				notification.description,
				DATE_FORMAT(notification.recoreded,'%d/%m/%Y  %h:%i %p') AS recoreded,
				notificationstatus.username,
				users.imageprofile
				FROM
				notification
				INNER JOIN notificationstatus ON notification.idnotification = notificationstatus.notificationid
				INNER JOIN users ON notificationstatus.username = users.username
				WHERE notificationstatus.`status`=0 AND notificationstatus.username=:user
				ORDER BY notification.idnotification DESC";
        $arrData = array(':user'=>$user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function showmorenotif() {
        $sql = "SELECT
				notification.idnotification,
				notification.description,
				notification.recoreded,
				notification.username,
				users.imageprofile
				FROM
				notification
				INNER JOIN users ON notification.username = users.username ORDER BY notification.idnotification DESC LIMIT 100";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function update($navmenuname, $sequencenumber, $span, $spanclass, $iclass, $liclass, $modulname) {
        $sql = "UPDATE navmenu SET navmenuname=:navmenuname, sequencenumber=:sequencenumber, span=:span, spanclass=:spanclass, iclass=:iclass, liclass=:liclass WHERE modulname=:modulname";
        $arrData = array(':navmenuname' => $navmenuname, ':sequencenumber' => $sequencenumber, ':span' => $span, ':spanclass' => $spanclass,':iclass' => $iclass,':liclass' => $liclass,':modulname' => $modulname);
        $this->data = $this->db->insertData($sql, $arrData);
		if ($this->data == true) {
            header("location:index.php");
        }
		return $this->data;
    }
	function updatedropdown($modulname, $spanclass) {
        $sql = "UPDATE navmenu SET  ulclass=CASE WHEN liclass='dropdown' THEN 'dropdown-menu' ELSE '' END, 
				role=CASE WHEN liclass='dropdown' THEN 'menu' ELSE '' END,
				datatoggle=CASE WHEN liclass='dropdown' THEN 'dropdown' ELSE '' END,
				spanclass=CASE WHEN liclass='dropdown' THEN 'caret' ELSE :spanclass END
				WHERE modulname=:modulname";
        $arrData = array(':modulname' => $modulname, ':spanclass' => $spanclass);
        $this->data = $this->db->insertData($sql, $arrData);
		if ($this->data == true) {
            header("location:index.php");
        }
		return $this->data;
    }
}
?>
