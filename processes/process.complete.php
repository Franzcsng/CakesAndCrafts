<?php
include '../classes/order.class.php';
include '../classes/complete.class.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id= isset($_GET['id']) ? $_GET['id'] : '';
$status= isset($_GET['status']) ? $_GET['status'] : '';

switch($action){
    case 'complete':
        new_complete_order();
	break;
}

function new_complete_order(){
	$complete = new Complete();
    $orderid = $_POST['orderid'];
    $courierid = $_POST['courierid'];
    $receiveby = $_POST['receiveby'];
    $deliveryfee = ($_POST['deliveryfee']);
    $deliveryaddress = ucwords($_POST['deliveryaddress']);
    $rid = $complete->complete_order($orderid,$receiveby,$courierid,$deliveryfee,$deliveryaddress);
    if($rid){
        header('location: ../index.php?page=orders&action=completeprofile&id='.$orderid);
    }
}
