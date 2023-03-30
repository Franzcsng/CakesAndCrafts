<?php
class Product{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='cakes&crafts_db';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_product($productname,$price, $productdesc){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$productname,$price,$productdesc,$NOW,$NOW,'available'],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_product (product_name, product_price, product_desc, product_date_added, product_time_added, product_status) VALUES (?,?,?,?,?,?)");
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

	

	public function list_products(){
		$sql="SELECT * FROM tbl_product";
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

// FUNCTIONS TO GET PRODUCT INFORMATION COLUMN DATA FROM PRODUCTS TABLE

	function get_product_id($productname){
		$sql="SELECT product_id FROM tbl_product WHERE product_name = :productname";	
		$q = $this->conn->prepare($sql);
		$q->execute(['productname' => $productname]);
		$product_id = $q->fetchColumn();
		return $product_id;
	}
	function get_product_name($id){
		$sql="SELECT product_name FROM tbl_product WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_name = $q->fetchColumn();
		return $product_name;
	}
	function get_product_price($id){
		$sql="SELECT product_price FROM tbl_product WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_price = $q->fetchColumn();
		return $product_price;
	}
	function get_product_desc($id){
		$sql="SELECT product_desc FROM tbl_product WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_desc = $q->fetchColumn();
		return $product_desc;
	}
	function get_product_status($id){
		$sql="SELECT product_status FROM tbl_product WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_status = $q->fetchColumn();
		return $product_status;
	}
	function get_session(){
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
			return true;
		}else{
			return false;
		}
	}

//UPDATE PRODUCT INFORMATION FUNCTIONS

	public function update_product($productname,$price,$productdesc,$productstatus,$id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_product SET product_name=:product_name,product_price=:product_price,product_desc=:product_desc,product_date_updated=:product_date_updated,product_time_updated=:product_time_updated, product_status=:product_status WHERE product_id=:product_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':product_name'=>$productname, ':product_price'=>$price, ':product_desc'=>$productdesc,':product_date_updated'=>$NOW,':product_time_updated'=>$NOW,':product_status'=>$productstatus,':product_id'=>$id));
		return true;
	}

	public function change_status($id, $status){
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_product SET product_status=:product_status,product_date_updated=:product_date_updated,product_time_updated=:product_time_updated WHERE product_id=:product_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':product_status'=>$status,':product_date_updated'=>$NOW,':product_time_updated'=>$NOW,':product_id'=>$id));
		return true;
	}

	public function change_price($id, $price){
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_product SET product_price=:product_price,product_date_updated=:product_date_updated,product_time_updated=:product_time_updated WHERE product_id=:product_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':product_price'=>$price,':product_date_updated'=>$NOW,':product_time_updated'=>$NOW,':product_id'=>$id));
		return true;
	}

	public function change_desc($id, $productdesc){
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_product SET product_desc=:product_desc,product_date_updated=:product_date_updated,product_time_updated=:product_time_updated WHERE product_id=:product_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':product_desc'=>$productdesc,':product_date_updated'=>$NOW,':product_time_updated'=>$NOW,':product_id'=>$id));
		return true;
	}
}