<?php
//Include class files to be used in page and following sub pages
include_once 'classes/product.class.php';
include_once 'classes/order.class.php';
include_once 'classes/class.user.php';

/* instantiate class objects */
$product = new Product();
$order = new Order();

?>

<div class="content-main">
    <div class="main-home">

<div class="prev-block">
    <div class="prev-header">
        <h1>Orders</h1>
        <div class="prev-header-nav" id="orders-prev-nav">
                    <a href="index.php?page=orders">Order List</a>
                    <a href="index.php?page=orders&action=neworder">New Order</a>
        </div>
    </div>
    

    <table id="order-list">
      <tr>
        <th class="id">#</th>
        <th class="orderid">Order Id</th>
        <th class="clientid">Client</th>
        <th class="productid">Contact</th>
        <th class="orderamount">Email</th>
        <th class="totalprice">Date Created</th>
      </tr>
<?php
// CALLS LIST FUNCTION OF ORDERS TO DISPLAY DATA 
$count = 1;
if($order->list_order() != false){
foreach($order->list_order() as $value){
   extract($value);
  
?>
      <tr>
        <td class="center"><?php echo $count;?></td>
        <td class="center"><a href="index.php?page=orders&action=additems&id=<?php echo $order_id;?>"><?php echo $order_id;?></a></td>
        <td class="center"><?php echo $client_firstname.', '.$client_lastname;?></td>
        <td class="center"><?php echo $client_phone;?></td>
        <td class="center"><?php echo $client_email;?></td>
        <td class="center"><?php echo $order_date_added;?></td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>
</div>


</div>
