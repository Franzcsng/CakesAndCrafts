<?php
include_once 'classes/product.class.php';
include_once 'classes/courier.class.php';
include_once 'classes/order.class.php';
include_once 'classes/complete.class.php';

/* instantiate class object */
$complete = new Complete();
$product = new Product();
$courier = new Courier();
$order = new Order();

?>

<div class="content-main">
    <div class="subclass-nav">

        <a href="index.php?page=orders&action=orders">orders</a>
        <a href="index.php?page=orders&action=neworder">add order</a>
        <a href="index.php?page=orders&action=couriers">couriers</a>
        <a href="index.php?page=orders&action=addcourier">add courier</a>
        
    </div>
    
    <div class="content-main2">
    <?php
                switch($action){
                case 'orders':
                    require_once 'orders/view-orders.php';
                break; 
                case 'ongoing':
                    require_once 'orders/on-going-orders.php';
                break; 
                case 'completed':
                    require_once 'orders/view-completed-orders.php';
                break; 
                case 'neworder':
                    require_once 'orders/create-order.php';
                break; 
                case 'couriers':
                    require_once 'couriers/view-couriers.php';
                break; 
                case 'addcourier':
                    require_once 'couriers/create-courier.php';
                break; 
                case 'additems':
                    require_once 'orders/add-order-items.php';
                break; 
                case 'completeprofile':
                    require_once 'orders/complete-order-profile.php';
                break; 
                default:
                    require_once 'orders/view-orders.php';
                break;
            }
    ?>
    </div>
</div>