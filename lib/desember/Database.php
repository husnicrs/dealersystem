<?php
    define("HOST", "localhost");
    define("USER", "hondamit_admin");
    define("PASSWORD", "123Sampai9");
    define("DB", "hondamit_desember");

    $connection = mysqli_connect(HOST, USER, PASSWORD, DB) OR DIE("Impossible to access to DB : " . mysqli_connect_error());


	$gaSql['user']     = 'hondamit_admin';
	$gaSql['password'] = '123Sampai9';   
	$gaSql['db']       = 'hondamit_desember';  //Database
	$gaSql['server']   = 'localhost';   
	$gaSql['port']     = 3306; // 3306 is the default MySQL port
	
	// Input method (use $_GET, $_POST or $_REQUEST)
	$input =& $_POST;

	$gaSql['charset']  = 'utf8';
	
	/**
		* MySQL connection
	*/
	$db = new mysqli($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'], $gaSql['port']);
	if (mysqli_connect_error()) {
		die( 'Error connecting to MySQL server (' . mysqli_connect_errno() .') '. mysqli_connect_error() );
	}
	
	if (!$db->set_charset($gaSql['charset'])) {
		die( 'Error loading character set "'.$gaSql['charset'].'": '.$db->error );
	}

	//Connection Database
	$con = mysqli_connect("localhost","hondamit_admin","123Sampai9","hondamit_desember");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

class Database {
    private $host = "localhost";
    private $user = "hondamit_admin";
    public $db = "hondamit_desember";
    private $pass = "123Sampai9";
    private $conn;
    public function __construct() {
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);
		
    }
	
    public function loadData($sql) {
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $r;
        }
        if (empty($data)) {
            return 0;
        } else {
            return $data;
        }
    }
    public function fetchData($sql) {
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch(PDO::FETCH_NUM, PDO::FETCH_ASSOC)) {
            $data[] = $r;
        }
        if (empty($data)) {
            return 0;
        } else {
            return $data;
        }
    }
    public function fetchArray($sql) {
        $q = $this->conn->query($sql) or die("failed!");
        return $q;
    }
    public function searchData($sql, $arrData) {
        $q = $this->conn->prepare($sql);
        $q->execute($arrData);
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $r;
        }
        if (empty($data)) {
            return 0;
        } else {
            return $data;
        }
    }
    public function getById($sql, $arrData) {
        $q = $this->conn->prepare($sql);
        $q->execute($arrData);
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function update($sql, $arrData) {
        $q = $this->conn->prepare($sql);
        $q->execute($arrData);
        return true;
    }
    public function insertData($sql, $arrData) {
        $q = $this->conn->prepare($sql);
        $q->execute($arrData);
        return true;
    }
    public function deleteData($sql, $arrData) {
        $q = $this->conn->prepare($sql);
        $q->execute($arrData);
        return true;
    }
    public function rowCount($sql) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $cek = $stmt->rowCount();
        return $cek;
    }
    public function PrimaryKey($tbname) {
        $q = $this->conn->query("select * from $tbname") or die("failed!");
        $data[] = $q->getColumnMeta(0);
        foreach ($data as $value) {
            extract($value);
            $val = $name;
        }

        if (empty($data)) {
            return 0;
        } else {
            return $name;
        }
    }
    public function selectfieldbynumber($tbname, $num) {
        $q = $this->conn->query("select * from $tbname") or die("failed!");
        $data[] = $q->getColumnMeta($num);
        foreach ($data as $value) {
            extract($value);
            $val = $name;
        }

        if (empty($data)) {
            return 0;
        } else {
            return $name;
        }
    }
    public function TotalFields($tbname) {
        $q = $this->conn->query("select * from $tbname") or die("failed!");
        $val = $q->ColumnCount();
        return $val;
    }
    public function TotalTables($dbname) {
        $q = $this->conn->query("SHOW TABLES from $dbname") or die("failed!");
        $val = $q->rowCount();
        return $val;
    }
    public function getAllFields($tbname) {
        $q = $this->conn->query("select * from $tbname") or die("failed!");
        $total = $this->TotalFields($tbname);
        for ($i = 0; $i <= $total - 1; $i++) {
            $data[] = $q->getColumnMeta($i);
        }
        foreach ($data as $value) {
            extract($value);
            $val = $name;
        }
        if (empty($data)) {
            return 0;
        } else {
            return $data;
        }
    }
    public function getFieldType($tbname, $fieldname) {
        $q = $this->conn->query("select * from $tbname") or die("failed!");
        $total = $this->TotalFields($tbname);
        for ($i = 0; $i <= $total - 1; $i++) {
            $data[] = $q->getColumnMeta($i);
        }
        foreach ($data as $value) {
            extract($value);
            $val = $name;
            if ($val == $fieldname) {
                $tipe = $native_type;
                break;
            } else {
                $tipe = '';
            }
        }
        if (empty($tipe)) {
            return 0;
        } else {
            if ($tipe == "DOUBLE") {
                $ket = "Double";
            } else if ($tipe == "VAR_STRING") {
                $ket = "String";
            } else {
                $ket = $tipe;
            }
            return $ket;
        }
    }
    public function singletbname($tbname) {
        $temp = $tbname . "#";
        if (preg_match('/ies#/i', $temp)) {
            $result = str_replace('ies#', 'y', $temp);
        } else if (preg_match('/ies#/i', $temp)) {
            $result = str_replace('es#', '', $temp);
        } else if (preg_match('/ies#/i', $temp)) {
            $result = str_replace('es#', 'e', $temp);
        } else if (preg_match('/ies#/i', $temp)) {
            $result = str_replace('/ies#/i', '', $temp);
        } else {
            $result = $tbname;
        }
        return $result;
    }
    public function realtbname($s) {
        if (preg_match('/ay_id/i', $s) || preg_match('/iy_id/i', $s) || preg_match('/uy_id/i', $s) || preg_match('/ey_id/i', $s) || preg_match('/oy_id/i', $s)) {
            $temp = str_replace("y_id", "ys", $s);
        } else if (preg_match('/y_id/i', $s)) {
            $temp = str_replace("y_id", "ies", $s);
        } else if (preg_match('/s_id/i', $s)) {
            $temp = str_replace("s_id", "ses", $s);
        } else if (preg_match('/e_id/i', $s)) {
            $temp = str_replace("e_id", "es", $s);
        } else {
            $temp = str_replace("_id", "s", $s);
        }
        return $temp;
    }
    public function nicefieldname($fieldname) {
        if (preg_match("/_/i", $fieldname)) {
            $val = preg_replace("/_/i", " ", $fieldname);
        } else {
            $val = $fieldname;
        }
        return ucwords($val);
    }
    public function combolist($varname, $tablename, $valuefield, $captionfield) {
        $sql = "select * from " . $tablename;
        $q = $this->fetchArray($sql);
        echo '<select name="' . $varname . '" id="' . $varname . '">';
        echo '<option></option>';
        foreach ($q as $row) {
            echo '<option value="' . $row[$valuefield] . '">' . $row[$captionfield] . '</option>';
        }
        echo '</select>';
    }
    public function combodb() {
        $sql = "show databases";
        $q = $this->fetchArray($sql);
        echo '<select name="dbname" id="dbname">';
        echo '<option></option>';
        $i = 1;
        foreach ($q as $row) {
            if ($i > 1) {
                echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
            }
            $i++;
        }
        echo '</select>';
    }
    public function loadReportData($sql) {
        $q = $this->conn->query($sql) or die("failed!");
        $i=0;
        while ($fetchdata = $q->fetch(PDO::FETCH_NUM)) {
            $i++;
            array_unshift($fetchdata, $i);
            $data[] = $fetchdata;
        }
        return $data;
    }
    public function lastID(){
        return $this->conn->lastInsertId('id');
    }
	
	public function LoadReportId($sql, $arrData) {
        $q = $this->conn->prepare($sql) or die("failed!");
        $q->execute($arrData);
        $i=0;
        while ($fetchdata = $q->fetch(PDO::FETCH_NUM)) {
            $i++;
            array_unshift($fetchdata, $i);
            $data[] = $fetchdata;
        }
		error_reporting(0);
        return $data;
    }
}

?>