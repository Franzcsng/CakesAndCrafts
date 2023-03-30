<div class="add-block">

    <div class="add-half">
        <div class="add-half1">
            <h3 class="add-h3">ORDER ID: </h3>
            <h3><?php echo $id;?></h3>
        </div>

        <div class="add-half1">
            <h3 class="add-h3">CLIENT: </h3>
            <h3><?php echo $order->get_client_firstname($id).' '.$order->get_client_lastname($id);?></h3>
        </div>
        <div class="add-half1">
            <h3 class="add-h3">ORDER STATUS: </h3>
            <h3><?php if($order->get_order_status($id)==0){echo 'ON GOING';}else{echo 'COMPLETED';}?></h3>
        </div>
    </div>

    <div class="add-half" id="add-half-1">
        <div class="add-half2">
            <h3 class="add-h3">CLIENT CONTACT: </h3>
            <h3><?php echo $order->get_client_phone($id);?></h3>
        </div>

        <div class="add-half2">
            <h3 class="add-h3">CLIENT EMAIL: </h3>
            <h3><?php echo $order->get_client_email($id);?></h3>
        </div>

    </div>
</div> 



<div class="add-main">
    <div class="add-content">
      <table id="order-product-list">
        <tr>
          <th>#</th>
          <th>Product Id</th>
          <th>Name</th>
          <th>Qty</th>
          <th>Amount</th>
          <th></th>
        </tr>
          <?php
          $count = 1;
          if($order->list_order_products($id) != false){
          foreach($order->list_order_products($id) as $value){
          extract($value);
          
          ?>
        <tr>
          <td class="center"><?php echo $count;?></td>
          <td class="center"><?php echo $product_id;?></td>
          <td class="center"><?php echo $product->get_product_name($product_id);?></td>
          <td class="center"><?php echo $product_qty;?></td>
          <td class="center"><?php echo $amount;?></td>
          <td id="td-button" class="center"><a href="processes/process.order.php?action=remove" class="table-delete">Remove</a></td>
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