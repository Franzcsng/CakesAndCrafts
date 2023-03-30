<?php
include '../classes/order.class.php';
include '../classes/product.class.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id= isset($_GET['id']) ? $_GET['id'] : '';
$status= isset($_GET['status']) ? $_GET['status'] : '';

switch($action){
	case 'new':
        create_new_order_product();
	break;
    case 'add':
        create_new_order();
	break;
    case 'remove':
        remove_order_product();
	break;
    case 'updateclient':
        update_client_info();
	break;
    case 'delete':
        delete_order();
	break;
}

function create_new_order(){
	$order = new Order();
    $clientfname = ucwords($_POST['clientfname']);
    $clientlname = ucwords($_POST['clientlname']);
    $clientemail = ($_POST['clientemail']);
    $clientphone = ($_POST['clientphone']);
    $resultid = $order->new_order($clientfname,$clientlname,$clientemail,$clientphone);
    if(is_numeric($resultid)){
        header('location: ../index.php?page=orders&action=additems&id='.$resultid);
    }
}
function delete_order(){
    $order = new Order();
    $orderid = $_POST['orderid'];
    $rid = $order->delete_order($orderid);
    if($rid){
        header('location: ../index.php?page=orders&action=orders');
    }
}
function create_new_order_product(){
    $product = new Product();
	$order = new Order();
    $orderid = $_POST['orderid'];
    $productid = $_POST['productid'];
    $productqty = ($_POST['productqty']);
    $amount = $productqty*($product->get_product_price($productid));
    $rid = $order->new_order_product($orderid,$productid,$productqty,$amount);
    if($rid){
        header('location: ../index.php?page=orders&action=additems&id='.$orderid);
    }
}

//NEW PROCESSES
function update_client_info(){
	$order = new Order();
    $orderid = $_POST['orderid'];
    $clientemail = $_POST['clientemail'];
    $clientphone = $_POST['clientphone'];
    $result = $order->update_client($clientemail,$clientphone,$orderid);
    if($result){
        header('location: ../index.php?page=orders&action=additems&id='.$orderid);
    }
    
}

function remove_order_product(){
    $order = new Order();
    $orderid = isset($_GET['id']) ? $_GET['id'] : '';
    $uniqid = $_POST['uniqid'];
    $result = $order->remove_product($uniqid);
    if($result){
        header('location: ../index.php?page=orders&action=additems&id='.$orderid);
    }
}