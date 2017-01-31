<?php
include_once 'Database.php';
class usermain {
    private $db = '';
    private $data;
    private $tabel = 'users';
    public function __construct() {
        $this->db = new Database();
    }
    function show() {
        $sql = "SELECT iduser, username, password FROM users";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
    function showDetail($id) {
        $sql = "SELECT * FROM $this->tabel WHERE iduser=:iduser";
        $arrData = array(':iduser' => $id);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
    function search($ket) {
        $sql = "SELECT * FROM $this->tabel WHERE username Like :ket";
        $arrData = array(':ket' => '%' . $ket . '%');
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
     function insert($username, $password) {
		$salt = sha1($password.'12+#æ345$2y$10$.vGA$2y$12$QjSH496pcT5CEbzjD/vtVeH03tfHKFy36d4J0Ltp3lRtee9HDxY3K'); 
		$password = base64_encode(md5($salt,PASSWORD_BCRYPT));

        $sql = "INSERT INTO $this->tabel SET username=:username,password=:password";
        $arrData = array(':username' => $username, ':password' => $password);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=user");
        }
        return $this->data;
    }
    function update($id, $username, $password, $action) {
		$salt = sha1($password.'12+#æ345$2y$10$.vGA$2y$12$QjSH496pcT5CEbzjD/vtVeH03tfHKFy36d4J0Ltp3lRtee9HDxY3K'); 
		$password = base64_encode(md5($salt,PASSWORD_BCRYPT));
		
        $sql = "UPDATE $this->tabel SET username=:username,password=:password WHERE iduser=:iduser";
        $arrData = array(':username' => $username, ':password' => $password, ':iduser' => $id);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=user");
        }
        return $this->data;
    }
    function delete($id) {
        $sql = "DELETE FROM $this->tabel WHERE iduser=:id";
        $arrData = array(':id' => $id);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=user");
        }
    }
    function showRole() {
        $sql = "SELECT * FROM `roles`";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
 }
?>
