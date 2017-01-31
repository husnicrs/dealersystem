<?php
include_once 'Database.php';
class year {
    private $db ='';
    private $data;
    private $tabel = 'year';
    public function __construct(){
        $this->db = new Database();
    }
    function show(){
        $sql = "SELECT * FROM $this->tabel";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
    function showDetail($id){
        $sql = "SELECT * FROM $this->tabel WHERE idyear=:idyear";
        $arrData = array(':idyear' => $id);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
    function search($ket){
        $sql = "SELECT * FROM $this->tabel WHERE year Like :ket";
        $arrData = array(':ket' => '%'.$ket.'%');
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function insert($year){
		$sql = "INSERT INTO $this->tabel SET year=:year";
		$arrData = array(':year'=>$year);
		$this->data = $this->db->insertData($sql, $arrData);
        if($this->data == true){
            header("location:index.php?mod=year");
        }
        return $this->data;
    }
	function update($id,$year,$action){
		$sql = "UPDATE $this->tabel SET year=:year WHERE idyear=:idyear";
		$arrData = array(':year'=>$year, ':idyear'=>$id);
		$this->data = $this->db->insertData($sql, $arrData);
        if($this->data == true){
            header("location:index.php?mod=year");
        }
        return $this->data;
    }
	function delete($id){
        $sql = "DELETE FROM $this->tabel WHERE idyear=:id";
        $arrData = array(':id' => $id);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true){
            header("location:index.php?mod=year");
        }
    }
}
?>
