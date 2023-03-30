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
    <div class="table-header">
      
    <h3>On-Going Orders</h3>
    
    </div>
    <table id="order-list">
      <tr>
        <th class="id">#</th>
        <th class="orderid">Order Id</th>
        <th class="clientid">Client</th>
        <th class="productid">Contact</th>
        <th class="orderamount">Email</th>
        <th class="totalprice">Date Created</th>
        <th class="totalprice">Status</th>
      </tr>

      <?php
      /* Call list function to get column data from database */
      $count = 1;
      if($order->list_ongoing_orders() != false){
      foreach($order->list_ongoing_orders() as $value){
        extract($value);
      ?>

      <tr>
        <td class="center"><?php echo $count;?></td>
        <td class="center">
          <a 
            <?php if( $order_status =='0'){ ?>
              href="index.php?page=orders&action=additems&id=<?php echo $order_id;?>"
            <?php }else{ ?>
              href="index.php?page=orders&action=completeprofile&id=<?php echo $order_id;?>"
            <?php } ?>><?php echo $order_id;?>
          </a>
        </td>
        <td class="center"><?php echo $client_firstname.', '.$client_lastname;?></td>
        <td class="center"><?php echo $client_phone;?></td>
        <td class="center"><?php echo $client_email;?></td>
        <td class="center"><?php echo $order_date_added;?></td>
        <td class="center"><?php if( $order_status =='0'){ echo 'On Going';}else{ echo 'Completed';}?></td>
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