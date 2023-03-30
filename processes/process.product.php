<?php
include '../classes/product.class.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new_product':
        create_new_product();
	break;
    case 'update_product':
        update_product();
	break;
    case 'deactivate_product':
        deactivate_product();
	break;
    case 'changeprice':
        change_product_price();
	break;
    case 'changedesc':
        change_product_desc();
	break;
    case 'status':
        change_product_status();
	break;
    
    
}

function create_new_product(){
	$product= new Product();
    $price = $_POST['productprice'];
    $productdesc = ucwords($_POST['productdesc']);
    $productname = ucwords($_POST['productname']);
    
    $result = $product->new_product($productname,$price,$productdesc);
    if($result){
        $id = $product->get_product_id($productname);
        header('location: ../index.php?page=products&action=profile&id='.$id);
    }
}

    function change_product_status(){
        $product = new Product();
        $productid= $_POST['productid'];
        $status= isset($_GET['status']) ? $_GET['status'] : '';
        $id= isset($_GET['id']) ? $_GET['id'] : '';
        $result = $product->change_status($id,$status);
        if($result){
            header('location: ../index.php?page=products&action=profile&id='.$productid);
        }
    }
    
    function change_product_desc(){
        $product = new Product();
        $id = $_POST['productid'];
        $new_description = $_POST['productdesc'];
        $result = $product->change_desc($id,$new_description);
        if($result){
            header('location: ../index.php?page=products&action=profile&id='.$id);
        }
    }
    
    function change_product_price(){
        $product = new Product();
        $id = $_POST['productid'];
        $new_price = $_POST['prodprice'];
        $result = $product->change_price($id,$new_price);
        if($result){
            header('location: ../index.php?page=products&action=profile&id='.$id);
        }
}

