<?php
include_once 'Database.php';
class combobox {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function showPeriod() {
        $sql = "SELECT * FROM period WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
    function showUsers() {
        $sql = "SELECT * FROM users";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showTicketStatus() {
        $sql = "SELECT * FROM ticketstatus";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showAttribute() {
        $sql = "SELECT * FROM attribute WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showCategory() {
        $sql = "SELECT * FROM category WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showUnit() {
        $sql = "SELECT * FROM unit WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showCity() {
        $sql = "SELECT * FROM city WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showCustomertype() {
        $sql = "SELECT * FROM customertype WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showInvGroup() {
        $sql = "SELECT * FROM inventorygroup WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showInvBrand() {
        $sql = "SELECT * FROM inventorybrand WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showInvType() {
        $sql = "SELECT * FROM inventorytype WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showInvSize() {
        $sql = "SELECT * FROM inventorysize WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showInvColor() {
        $sql = "SELECT * FROM inventorycolor WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showCustomer() {
        $sql = "SELECT * FROM customer WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showSupplier() {
        $sql = "SELECT * FROM supplier WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }

	function showSalesman() {
        $sql = "SELECT * FROM salesman WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
function showDriver() {
        $sql = "SELECT * FROM employee WHERE positionid=11";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showTOP() {
        $sql = "SELECT * FROM top WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showCurrency() {
        $sql = "SELECT * FROM currency WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showShipto() {
        $sql = "SELECT * FROM shipto WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showSubnavmenu() {
        $sql = "SELECT * FROM subnavmenu WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showPaytype() {
        $sql = "SELECT * FROM paytype WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showMatusedtype() {
        $sql = "SELECT * FROM matusedtype WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showBank() {
        $sql = "SELECT * FROM bank WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showPosition() {
        $sql = "SELECT * FROM position WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showDepartment() {
        $sql = "SELECT * FROM department WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showLocation() {
        $sql = "SELECT * FROM location WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showVehicletype1() {
        $sql = "SELECT * FROM vehicletype WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showVehiclegroup() {
        $sql = "SELECT * FROM vehiclegroup WHERE status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showVehiclecolor() {
        $sql = "SELECT lookupvehiclecolor FROM
				(
				SELECT
				vehiclestock.vehiclecolor AS lookupvehiclecolor 
				FROM
				vehiclestock
				GROUP BY vehiclestock.vehiclecolor
				UNION ALL
				SELECT
				vehiclecolor.vehiclecolorcode AS lookupvehiclecolor
				FROM
				vehiclecolor
				) AS DERIVEDTBL
				GROUP BY lookupvehiclecolor";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showEmployee() {
        $sql = "SELECT * FROM employee";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showMarketing() {
        $sql = "SELECT * FROM employee WHERE departmentid=1";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showEmployeeKasir() {
        $sql = "SELECT
				employee.idemployee,
				employee.employeename 
				FROM
				employee
				INNER JOIN position ON employee.positionid = position.idposition
				WHERE position.positionname='kasir'";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showEmployeeMekanik() {
        $sql = "SELECT
				employee.idemployee,
				employee.employeename 
				FROM
				employee
				INNER JOIN position ON employee.positionid = position.idposition
				WHERE position.positionname='mekanik'";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showDistricts() {
        $sql = "SELECT * FROM districts";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showVehiclemodel() {
        $sql = "SELECT
				vehicle.vehlicemodel AS lookupvehiclemodel
				FROM
				vehicle
				GROUP BY
				vehicle.vehlicemodel";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showVehicletype() {
        $sql = "SELECT
				vehicle.vehlicetype AS lookupvehicletype
				FROM
				vehicle
				GROUP BY
				vehicle.vehlicetype";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showVehiclegroupmodel() {
        $sql = "SELECT
				vehlicemodelgroup.idvehlicemodelgroup,
				vehlicemodelgroup.vehlicemodelgroupname,
				vehlicemodelgroup.`status`
				FROM
				vehlicemodelgroup";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showVahicletype() {
        $sql = "SELECT
				vehicle.vehlicetype AS lookupvehlicetype
				FROM
				vehicle
				GROUP BY
				vehicle.vehlicetype";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showVahicletype1() {
        $sql = "SELECT
				vehicle.vehlicetype AS lookupvehlicetype1
				FROM
				vehicle
				GROUP BY
				vehicle.vehlicetype";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showVehiclejenis() {
        $sql = "SELECT
				vehicle.vehlicejenis AS lookupvehlicejenis
				FROM
				vehicle
				GROUP BY
				vehicle.vehlicejenis";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showEducationlevel() {
        $sql = "SELECT * FROM educationlevel";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showProfession() {
        $sql = "SELECT * FROM profession";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showSamsat() {
        $sql = "SELECT * FROM samsat";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showVillage() {
        $sql = "SELECT * FROM village";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showChannel() {
        $sql = "SELECT * FROM channel";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showLeasing() {
        $sql = "SELECT * FROM leasing";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function showAccountLvl1() {
        $sql = "SELECT * FROM accountlvl1";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }

}
?>
