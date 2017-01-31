<?php
include_once 'Database.php';
class Role {
    private $db = '';
    private $data;
    private $tabel = 'roles';
    public function __construct() {
        $this->db = new Database();
    }
    function show() {
        $sql = "SELECT * FROM $this->tabel";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
}
