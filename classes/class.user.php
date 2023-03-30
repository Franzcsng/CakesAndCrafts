<?php
class User{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='cakes&crafts_db';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	


	public function new_user($email,$password,$lastname,$firstname, $phone){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$lastname,$firstname,$email,$password,$NOW,$NOW,'0', $phone],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_users (user_lastname, user_firstname, user_email, user_password, user_date_added, user_time_added, user_status, user_phone) VALUES (?,?,?,?,?,?,?,?)");
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


	public function list_users(){
		$sql="SELECT * FROM tbl_users";
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

//FUNCTIONS FOR GETTING COLUMN VALUES IN USER TABLE

	function get_user_id($email){
		$sql="SELECT user_id FROM tbl_users WHERE user_email = :email";	
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email]);
		$user_id = $q->fetchColumn();
		return $user_id;
	}
	function get_user_email($id){
		$sql="SELECT user_email FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_email = $q->fetchColumn();
		return $user_email;
	}
	function get_user_firstname($id){
		$sql="SELECT user_firstname FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_firstname = $q->fetchColumn();
		return $user_firstname;
	}
	function get_user_lastname($id){
		$sql="SELECT user_lastname FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_lastname = $q->fetchColumn();
		return $user_lastname;
	}
	function get_user_phone($id){
		$sql="SELECT user_phone FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_phone = $q->fetchColumn();
		return $user_phone;
	}
	function get_user_status($id){
		$sql="SELECT user_status FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_status = $q->fetchColumn();
		return $user_status;
	}

	//LOG-IN SESSION FUNCTIONS - CHECKING OF USER INFORMATION
	function get_session(){
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
			return true;
		}else{
			return false;
		}
	}
	public function check_login($email,$password){
		
		$sql = "SELECT count(*) FROM tbl_users WHERE user_email = :email AND user_password = :password"; 
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email,'password' => $password ]);
		$number_of_rows = $q->fetchColumn();
		

	
		if($number_of_rows == 1){
			
			$_SESSION['login']=true;
			$_SESSION['user_email']=$email;
			return true;
		}else{
			return false;
		}
	}

// UPDATE USER INFORMATION FUNCTIONS

	public function update_user($lastname,$firstname, $phone, $id){
		
	/* Setting Timezone for DB */
	$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
	$NOW = $NOW->format('Y-m-d H:i:s');

	$sql = "UPDATE tbl_users SET user_firstname=:user_firstname,user_lastname=:user_lastname,user_date_updated=:user_date_updated,user_time_updated=:user_time_updated,user_phone=:user_phone WHERE user_id=:user_id";

	$q = $this->conn->prepare($sql);
	$q->execute(array(':user_firstname'=>$firstname, ':user_lastname'=>$lastname,':user_date_updated'=>$NOW,':user_time_updated'=>$NOW,':user_phone'=>$phone,':user_id'=>$id));
	return true;
}
	public function change_user_status($id,$status){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_users SET user_status=:user_status,user_date_updated=:user_date_updated,user_time_updated=:user_time_updated WHERE user_id=:user_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':user_status'=>$status,':user_date_updated'=>$NOW,':user_time_updated'=>$NOW,':user_id'=>$id));
		return true;
	}

	public function change_email($id,$email){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_users SET user_email=:user_email,user_date_updated=:user_date_updated,user_time_updated=:user_time_updated WHERE user_id=:user_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':user_email'=>$email,':user_date_updated'=>$NOW,':user_time_updated'=>$NOW,':user_id'=>$id));
		return true;
	}

	public function change_password($id,$password){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_users SET user_password=:user_password,user_date_updated=:user_date_updated,user_time_updated=:user_time_updated WHERE user_id=:user_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':user_password'=>$password,':user_date_updated'=>$NOW,':user_time_updated'=>$NOW,':user_id'=>$id));
		return true;
	}
	
}