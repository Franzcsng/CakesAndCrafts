<?php
include '../classes/courier.class.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_courier();
	break;
    case 'update':
        update_courier();
	break;
    case 'updatecontact':
        change_courier_contact();
	break;
}

function create_new_courier(){
	$courier = new Courier();
    $couriername = ucwords($_POST['couriername']);
    $couriercontact = ucwords($_POST['couriercontact']);
    
    $result = $courier->new_courier($couriername,$couriercontact);
    if($result){
        $id = $courier->get_courier_id($couriername);
        header('location: ../index.php?page=orders&action=couriers');
    }
}

function update_courier(){
	$courier = new Courier();
    $courier_id = $_POST['courierid'];
    $couriername = $_POST['couriername'];
    $couriercontact = ucwords($_POST['couriercontact']);
   
    
    $result = $user->update_courier($couriername,$couriercontact,$courier_id);
    if($result){
        header('location: ../index.php?page=orders&action=profile&id='.$courier_id);
    }
}




//NEW PROCESSES
function change_user_status(){
	$user = new User();
    $id= isset($_GET['id']) ? $_GET['id'] : '';
    $status= isset($_GET['status']) ? $_GET['status'] : '';
    $result = $user->change_user_status($id,$status);
    if($result){
        header('location: ../index.php?page=users&action=profile&id='.$id);
    }
}

function change_user_password(){
	$user = new User();
    $id = $_POST['userid'];
    $current_password = $_POST['crpassword'];
    $new_password = $_POST['npassword'];
    $confirm_password = $_POST['copassword'];
    $result = $user->change_password($id,$new_password);
    if($result){
        header('location: ../index.php?page=users&action=profile&id='.$id);
    }
}

function change_user_email(){
	$user = new User();
    $id = $_POST['userid'];
    $current_email = $_POST['useremail'];
    $new_email = $_POST['newemail'];
    $current_password = $_POST['crpassword'];
    $result = $user->change_email($id,$new_email);
    if($result){
        header('location: ../index.php?page=users&action=profile&id='.$id);
    }
}