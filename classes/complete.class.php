<?php
class Complete{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='cakes&crafts_db';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}

public function complete_order($orderid,$receiveby,$courierid,$deliveryfee,$deliveryaddress){
	
	/* Setting Timezone for DB */
	$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
	$NOW = $NOW->format('Y-m-d H:i:s');

	$sql = "UPDATE tbl_orders SET order_status=:order_status,order_date_updated=:order_date_updated,order_time_updated=:order_time_updated WHERE order_id=:order_id";

	$q = $this->conn->prepare($sql);
	$q->execute(array(':order_status'=>'1',':order_date_updated'=>$NOW,':order_time_updated'=>$NOW,':order_id'=>$orderid));
	
	$data = [
		[$orderid,$receiveby,$courierid,$deliveryfee,$deliveryaddress,$NOW,$NOW],
	];
	$stmt = $this->conn->prepare("INSERT INTO tbl_order_complete (order_id, received_by, courier_id, delivery_fee, delivery_address, completed_date_added,completed_time_added) VALUES (?,?,?,?,?,?,?)");
	try {
		$this->conn->beginTransaction();
		foreach ($data as $row)
		{
			$stmt->execute($row);
		}
		$id= $this->conn->lastInsertId();
		$this->conn->commit();
	}catch (Exception $e){
		$this->conn->rollback();
			throw $e;
	}
	return true;
}

public function list_complete(){
	$sql="SELECT * FROM tbl_order_complete";
	$q = $this->conn->query($sql) or die("failed!");
	while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$data[]=$r;
	}
	if(empty($data)){
	   return false;
	}else{
		return $data;	
	}
	}

//GET COMPLETED ORDERS INFORMATION COLUMN DATA FROM COMPLETE ORDERS TABLE

function get_complete_id($receiveby){
	$sql="SELECT order_id FROM tbl_order_complete WHERE receive_by = :receiveby";	
	$q = $this->conn->prepare($sql);
	$q->execute(['receiveby' => $receiveby]);
	$complete_id = $q->fetchColumn();
	return $complete_id;
}
function get_received_by($id){
	$sql="SELECT received_by FROM tbl_order_complete WHERE order_id = :id";	
	$q = $this->conn->prepare($sql);
	$q->execute(['id' => $id]);
	$received_by = $q->fetchColumn();
	return $received_by;
}
function get_courier_id($id){
	$sql="SELECT courier_id FROM tbl_order_complete WHERE order_id = :id";	
	$q = $this->conn->prepare($sql);
	$q->execute(['id' => $id]);
	$courier_id = $q->fetchColumn();
	return $courier_id;
}
function get_delivery_fee($id){
	$sql="SELECT delivery_fee FROM tbl_order_complete WHERE order_id = :id";	
	$q = $this->conn->prepare($sql);
	$q->execute(['id' => $id]);
	$delivery_fee = $q->fetchColumn();
	return $delivery_fee;
}
function get_delivery_address($id){
	$sql="SELECT delivery_address FROM tbl_order_complete WHERE order_id = :id";	
	$q = $this->conn->prepare($sql);
	$q->execute(['id' => $id]);
	$delivery_address = $q->fetchColumn();
	return $delivery_address;
}

function get_date_completed($id){
	$sql="SELECT completed_date_added FROM tbl_order_complete WHERE order_id = :id";	
	$q = $this->conn->prepare($sql);
	$q->execute(['id' => $id]);
	$completed_date = $q->fetchColumn();
	return $completed_date;
}

}