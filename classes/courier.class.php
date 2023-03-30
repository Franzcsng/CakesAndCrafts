<?php
class Courier{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='cakes&crafts_db';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_courier($couriername, $couriercontact){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$couriername,$couriercontact,$NOW,$NOW],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_courier (courier_name, courier_contact, courier_date_added, courier_time_added) VALUES (?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}

	public function list_couriers(){
		$sql="SELECT * FROM tbl_courier";
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

//GET COURIER INFORMATION COLUMN DATA FROM COURIER TABLE

	function get_courier_id($couriername){
		$sql="SELECT courier_id FROM tbl_courier WHERE courier_name = :couriername";	
		$q = $this->conn->prepare($sql);
		$q->execute(['couriername' => $couriername]);
		$courier_id = $q->fetchColumn();
		return $courier_id;
	}
	function get_courier_name($id){
		$sql="SELECT courier_name FROM tbl_courier WHERE courier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$courier_name = $q->fetchColumn();
		return $courier_name;
	}
	function get_courier_contact($id){
		$sql="SELECT courier_contact FROM tbl_courier WHERE courier_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$courier_contact = $q->fetchColumn();
		return $courier_contact;
	}
	

//UPDATE COURIER INFORMATION FUNCTION(S)

	public function update_courier($couriername,$couriercontact){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_courier SET courier_name=:courier_name,courier_contact=:courier_contact,courier_date_updated=:courier_date_updated,courier_time_updated=:courier_time_updated WHERE courier_id=:courier_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':courier_name'=>$couriername, ':courier_contact'=>$couriercontact,':courier_date_updated'=>$NOW,':courier_time_updated'=>$NOW,':courier_id'=>$id));
		return true;
	}
	
}