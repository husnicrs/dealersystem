<?php
include_once 'Database.php';
class Users {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
	function showDetail($id){
        $sql = "SELECT * FROM users WHERE iduser=:iduser";
        $arrData = array(':iduser' => $id);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
	function showProfile(){
		$user=$_SESSION['uname'];
        $sql = "SELECT
				users.iduser,
				users.username,
				users.`password`,
				users.usertypeid,
				users.active,
				users.begindate,
				users.enddate,
				users.employeeid,
				users.periodid,
				users.transid,
				DATE_FORMAT(users.recorded, '%W %M %Y') AS recorded,
				users.`name`,
				users.email,
				users.imageprofile
				FROM users
				WHERE username='".$user."'";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showConfigIcon(){
		$user=$_SESSION['uname'];
        $sql = "SELECT
				users.iduser,
				CASE WHEN users.username='admin' THEN '?mod=submenu' ELSE '#' END AS addmenu,
				CASE WHEN users.username='admin' THEN '?mod=menudesign&key=' ELSE '#' END AS configmenu,
				CASE WHEN users.username='admin' THEN '' ELSE 'style=color:#666 !important' END AS colormenu
				FROM users
				WHERE username='".$user."'";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showProfilePart(){
		$user=$_SESSION['uname'];
        $sql = "SELECT
				users.iduser,
				users.username,
				users.usertypeid,
				MAX(userpartauthorized.partid) AS partid
				FROM
				users
				INNER JOIN userpartauthorized ON users.iduser = userpartauthorized.userid
				WHERE username='".$user."'
				GROUP BY users.iduser,
				users.username,
				users.usertypeid";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }

	function showCountLogin(){
		$user=$_SESSION['uname'];
        $sql = "SELECT
				COUNT(userlog.iduserlog) AS countlogin
				FROM
				userlog
				WHERE userlog.username='".$user."'";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showProfileUpdate($key){
        $sql = "SELECT
				users.iduser,
				users.username,
				users.`password`,
				users.usertypeid,
				users.active,
				users.begindate,
				users.enddate,
				users.employeeid,
				users.periodid,
				users.transid,
				DATE_FORMAT(users.recorded, '%W %M %Y') AS recorded,
				users.`name`,
				users.email,
				users.imageprofile,
				usertype.idusertype,
				usertype.usertypename
				FROM
				users
				LEFT JOIN usertype ON users.usertypeid = usertype.idusertype
				WHERE username=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
	function showUpdDetail($key){
        $sql = "SELECT
				users.iduser,
				users.username,
				users.`password`,
				users.usertypeid,
				users.active,
				users.begindate,
				users.enddate,
				users.employeeid,
				users.periodid,
				users.transid,
				DATE_FORMAT(users.recorded, '%W %M %Y') AS recorded,
				users.`name`,
				users.email,
				users.imageprofile,
				usertype.idusertype,
				usertype.usertypename
				FROM
				users
				LEFT JOIN usertype ON users.usertypeid = usertype.idusertype
				WHERE users.iduser=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
    public function UserLogin($user, $password) {
		$salt = sha1($password.'12+#æ345$2y$10$.vGA$2y$12$QjSH496pcT5CEbzjD/vtVeH03tfHKFy36d4J0Ltp3lRtee9HDxY3K'); 
		$password = base64_encode(md5($salt,PASSWORD_BCRYPT));

        $sql = "SELECT * FROM users 
		INNER JOIN usertype ON users.usertypeid = usertype.idusertype
		where (username='$user') and (password='$password') AND (CURTIME() BETWEEN usertype.stlogtime AND usertype.fnlogtime)";
        $cek = $this->db->rowCount($sql);
        if ($cek == 1) {
            header('location:index.php');
        } 
    }
    public function checkLogin($user, $password) {
		$salt = sha1($password.'12+#æ345$2y$10$.vGA$2y$12$QjSH496pcT5CEbzjD/vtVeH03tfHKFy36d4J0Ltp3lRtee9HDxY3K'); 
		$password = base64_encode(md5($salt,PASSWORD_BCRYPT));

        $sql = "SELECT * FROM users 
		INNER JOIN usertype ON users.usertypeid = usertype.idusertype
		where (username='$user') and (password='$password') AND (CURTIME() BETWEEN usertype.stlogtime AND usertype.fnlogtime)";
        $cek = $this->db->rowCount($sql);
        if ($cek != 1) {
            header('location:login.html');
        }
    }
    function logOut() {
        session_destroy();
        header('location:login.html');
    }
	function insert($us, $logindate, $logoutdate, $iduser){
		$sql = "INSERT INTO userlog SET username=:username, logindate=:logindate, logoutdate=:logoutdate, userid=:userid";
		$arrData = array(':username'=>$us, ':logindate'=>$logindate, ':logoutdate'=>$logoutdate, ':userid'=>$iduser);
		$this->data = $this->db->insertData($sql, $arrData);
        return $this->data;
    }
	function insertlog($us, $logindate, $logoutdate){
		$sql = "INSERT INTO userlog SET username=:username, logindate=:logindate, logoutdate=:logoutdate";
		$arrData = array(':username'=>$us, ':logindate'=>$logindate, ':logoutdate'=>$logoutdate);
		$this->data = $this->db->insertData($sql, $arrData);
        return $this->data;
    }

	function showusertype(){
        $sql = "SELECT * FROM usertype";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function insertuser($username, $password, $usertypeid, $email, $name, $imageprofile){
		$salt = sha1($password.'12+#æ345$2y$10$.vGA$2y$12$QjSH496pcT5CEbzjD/vtVeH03tfHKFy36d4J0Ltp3lRtee9HDxY3K'); 
		$password = base64_encode(md5($salt,PASSWORD_BCRYPT));
		$sql = "INSERT INTO users SET username=:username, password=:password, usertypeid=:usertypeid, email=:email, name=:name, recorded=NOW(), imageprofile=:imageprofile";
		$arrData = array(':username'=>$username, ':password'=>$password, ':usertypeid'=>$usertypeid, ':email'=>$email, ':name'=>$name, ':imageprofile'=>$imageprofile);
		$this->data = $this->db->insertData($sql, $arrData);
        if($this->data == true){
            header("location:index.php?mod=adduser_success");
        }
        return $this->data;
    }
	function insertuser1($username, $password, $usertypeid, $email, $name){
		$salt = sha1($password.'12+#æ345$2y$10$.vGA$2y$12$QjSH496pcT5CEbzjD/vtVeH03tfHKFy36d4J0Ltp3lRtee9HDxY3K'); 
		$password = base64_encode(md5($salt,PASSWORD_BCRYPT));
		$sql = "INSERT INTO users SET username=:username, password=:password, usertypeid=:usertypeid, email=:email, name=:name, recorded=NOW()";
		$arrData = array(':username'=>$username, ':password'=>$password, ':usertypeid'=>$usertypeid, ':email'=>$email, ':name'=>$name);
		$this->data = $this->db->insertData($sql, $arrData);
        if($this->data == true){
            header("location:index.php?mod=adduser_success");
        }
        return $this->data;
    }
	function updateuser($username,  $usertypeid, $email, $name, $imageprofile){
		$user=$_SESSION['uname'];
		$sql = "UPDATE users SET username=:username, usertypeid=:usertypeid, email=:email, name=:name, imageprofile=:imageprofile WHERE username='".$user."'";
		$arrData = array(':username'=>$username, ':usertypeid'=>$usertypeid, ':email'=>$email, ':name'=>$name, ':imageprofile'=>$imageprofile);
		$this->data = $this->db->insertData($sql, $arrData);
        if($this->data == true){
            header("location:index.php?mod=adduser_update");
        }
        return $this->data;
    }
	function updateusernoimg($username,  $usertypeid, $email, $name){
		$user=$_SESSION['uname'];
		$sql = "UPDATE users SET username=:username, usertypeid=:usertypeid, email=:email, name=:name WHERE username='".$user."'";
		$arrData = array(':username'=>$username, ':usertypeid'=>$usertypeid, ':email'=>$email, ':name'=>$name);
		$this->data = $this->db->insertData($sql, $arrData);
        if($this->data == true){
            header("location:index.php?mod=adduser_update");
        }
        return $this->data;
    }
	function upduserautorized($username,  $usertypeid, $email, $name, $key){
		$sql = "UPDATE users SET username=:username, usertypeid=:usertypeid, email=:email, name=:name WHERE iduser=:key";
		$arrData = array(':username'=>$username, ':usertypeid'=>$usertypeid, ':email'=>$email, ':name'=>$name, ':key'=>$key);
		$this->data = $this->db->insertData($sql, $arrData);
        if($this->data == true){
            header("location:index.php?mod=menuautorized");
        }
        return $this->data;
    }
	function changepassword($password){
		$salt = sha1($password.'12+#æ345$2y$10$.vGA$2y$12$QjSH496pcT5CEbzjD/vtVeH03tfHKFy36d4J0Ltp3lRtee9HDxY3K'); 
		$password = base64_encode(md5($salt,PASSWORD_BCRYPT));
		$user=$_SESSION['uname'];
		$sql = "UPDATE users SET password=:password WHERE username='".$user."'";
		$arrData = array(':password'=>$password);
		$this->data = $this->db->insertData($sql, $arrData);
        if($this->data == true){
            header("location:logout.php");
        }
        return $this->data;
    }
	function deleteuser($key){
		$sql = "DELETE FROM users WHERE iduser='".$key."'";
		$arrData = array(':key'=>$key);
		$this->data = $this->db->insertData($sql, $arrData);
        if($this->data == true){
            header("location:index.php?mod=menuautorized");
        }
        return $this->data;
    }
	function deleteusermenu($key){
		$sql = "DELETE FROM userauthorized WHERE userid='".$key."'";
		$arrData = array(':key'=>$key);
		$this->data = $this->db->insertData($sql, $arrData);
        if($this->data == true){
            header("location:index.php?mod=menuautorized");
        }
        return $this->data;
    }
	function deleteuserpart($key){
		$sql = "DELETE FROM userpartauthorized WHERE userid='".$key."'";
		$arrData = array(':key'=>$key);
		$this->data = $this->db->insertData($sql, $arrData);
        if($this->data == true){
            header("location:index.php?mod=menuautorized");
        }
        return $this->data;
    }

}
?>
