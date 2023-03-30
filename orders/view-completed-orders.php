<div class="content-main2">

  <div class="page-top-nav">
    <label id="nav-search" for="nav-search">Search</label>
    <input type="text" id="nav-search-input" name="nav-search">
    <div class="page-top-nav-block">
      <a href="index.php?page=orders&action=orders">All Orders</a>
      <a href="index.php?page=orders&action=ongoing">On Going</a>
      <a href="index.php?page=orders&action=completed">Completed</a>
    </div>
  </div>

  <div class="table-orders">
    <div class="table-header"><h3>Completed Orders</h3></div>
    <table id="order-list">
      <tr>
        <th class="id">#</th>
        <th class="orderid">Order Id</th>
        <th class="clientid">Received by</th>
        <th class="productid">Courier</th>
        <th class="orderamount">Delivery Fee</th>
        <th class="totalprice">Delivery Address</th>
        <th class="totalprice">Date Completed</th>
      </tr>

      <?php
      /* Call list function to get column data from database */
      $count = 1;
      if($complete->list_complete() != false){
      foreach($complete->list_complete() as $value){
        extract($value);
      ?>

      <tr>
        <td class="center"><?php echo $count;?></td>
        <td class="center"><a href="index.php?page=orders&action=completeprofile&id=<?php echo $order_id;?>"><?php echo $order_id;?></a></td>
        <td class="center"><?php echo $received_by;?></td>
        <td class="center"><?php echo $courier->get_courier_name($courier_id);?></td>
        <td class="center"><?php echo $delivery_fee;?></td>
        <td class="center"><?php echo $delivery_address;?></td>
        <td class="center"><?php echo $complete->get_date_completed($order_id);?></td>
      </tr>
      
      <?php
      $count++;
      }
      }else{?>
      <h4 id="no-record-notif">NO RECORD FOUND </h4>
      <?php }
      ?>
    </table>
  </div>
</div>