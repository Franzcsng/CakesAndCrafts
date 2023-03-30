
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
          // CALLS LIST FUNCTION OF ORDER PRODUCTS TO DISPLAY DATA 
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
        }else{?>
          <h4 id="no-record-notif">EMPTY ORDER </h4>
         <?php }
          ?>
      </table>

          <div class="total-products">
            <div class="block-total">
              <h3>P<?php echo $order->get_product_sum($id);?> </h3> 
            </div>
            <div class="block-total">
            <h3>Total Amount: </h3>
          </div>
          </div>
    </div>

    <div class="add-button">
        <button onclick="document.getElementById('order-product-modal1').style.display='block'" >Add Item</button>
        <button onclick="document.getElementById('order-product-modal2').style.display='block'">Complete Order</button>
        <button onclick="document.getElementById('order-product-modal3').style.display='block'">Change Client Info</button>
        <button onclick="document.getElementById('order-product-modal4').style.display='block'">Delete Order</button>
    </div>
</div>


<?php// Modal pop-up to add items into order ?>
<div id="order-product-modal1"class="modal-orderitems">
    <div class="modal-content-orderitems">
      <h3>Add Item</h3>
      <form method="POST" id="addproductForm" action="processes/process.order.php?action=new">
        
      <div class="order-form-block">
          <input type="hidden" id="orderid" name="orderid" value="<?php echo $id;?>"/>
            <label class="product-lbl" for="productid">Product</label>
            <select class="product-select" name="productid">
                <?php
                // CALLS LIST FUNCTION OF PRODUCTS TO DISPLAY PRODUCTS AS SELECT OPTION
                if($product->list_products() != false){
                    foreach($product->list_products() as $value){
                    extract($value);
                ?>
                    <option value="<?php echo $product_id;?>"><?php echo $product_name.' [P'.$product_price.']';?></option>
                <?php
                    }
                }
                ?>
            </select> 
      </div>

        <div class="order-form-block">
          <label for="productqty">Quantity</label>
          <input type="number"  class="input" name="productqty" value="1">
        </div>      

        <div class="order-form-block">
          <input type="hidden"  class="input" value="<?php echo $product_qty*$product->get_product_price($product_id);?>" name="amount" placeholder="0">
        </div>   
      </form> 
      <div class="modal-buttons">
        <button  onclick="addproductSubmit()">Add</button>
        <button  onclick="document.getElementById('order-product-modal1').style.display='none'">Cancel</button>
      </div>
       
    </div>

</div>

<?php// Modal pop-up to complete order and add complete order info ?>
<div id="order-product-modal2"class="modal-orderitems">
    <div class="modal-content-orderitems" id="complete-modal-content">
      <h3>Enter Completed Order Information</h3>
      <form method="POST" id="completeForm" action="processes/process.complete.php?action=complete">
        
      <div class="order-form-block">
          <input type="hidden" id="orderid" name="orderid" value="<?php echo $id;?>"/>
          <label for="receiveby">Order Received by</label>
          <select class="product-select" name="receiveby">
            <option value="N/A">N/A</option>
            <option value="Pick Up">Pick Up</option>
            <option value="Delivery">Delivery</option>
          </select>
      </div>

        <div class="order-form-block">
            <label class="courier-lbl" for="courierid">Courier</label>
            <select class="product-select" name="courierid">
                
                <?php
                // CALLS LIST FUNCTION OF COURIERS TO DISPLAY COURIERS AS SELECT OPTION
                if($courier->list_couriers() != false){
                    foreach($courier->list_couriers() as $value){
                    extract($value);
                ?>
                    <option value="<?php echo $courier_id;?>"><?php echo $courier_name;?></option>
                <?php
                    }
                }
                ?>
            </select> 
        </div>      

        <div class="order-form-block">
          <label for="deliveryfee">Delivery Fee</label>
          <input type="number"  class="input" name="deliveryfee" placeholder="Delivery Fee..">
        </div>   
        <div class="order-form-block">
          <label for="deliveryaddress">Delivery Address</label>
          <input type="text"  class="input" name="deliveryaddress" placeholder="Address..">
        </div>  
      </form> 
      <div class="modal-buttons">
        <button  onclick="completeSubmit()">Add</button>
        <button  onclick="document.getElementById('order-product-modal2').style.display='none'">Cancel</button>
      </div>
       
    </div>

</div>

<?php// Modal pop-up to update order and client information ?>

<div id="order-product-modal3"class="modal-orderitems">
    <div class="modal-content-orderitems">
      <h3>Enter New Client Info</h3>
      <form method="POST" id="updateForm" action="processes/process.order.php?action=updateclient">
        
      <div class="order-form-block">
          <input type="hidden" id="orderid" name="orderid" value="<?php echo $id;?>"/>
          <label for="clientemail">Client Email</label>
          <input type="email" class="product-select" name="clientemail" placeholder="New Email..">
      </div>


        <div class="order-form-block">
          <label for="clientphone">Client Contact No.</label>
          <input type="tel"  class="input" name="clientphone" placeholder="New Phone..">
        </div>   
      </form> 
      <div class="modal-buttons">
        <button  onclick="updateSubmit()">Update</button>
        <button  onclick="document.getElementById('order-product-modal3').style.display='none'">Cancel</button>
      </div>
       
    </div>

</div>

<?php// Modal pop-up to delete order and products in order ?>
<div id="order-product-modal4"class="modal-orderitems">
    <div class="modal-content-orderitems">
      <h3>Enter New Client Info</h3>
      <form method="POST" id="deleteForm" action="processes/process.order.php?action=delete">
      <input type="hidden" id="orderid" name="orderid" value="<?php echo $id;?>"/>
      <div class="order-form-block">
          <h3>Are you sure you want to delete this order?</h3>
      </div>
      </form>
      <div class="modal-buttons">
        <button  onclick="deleteSubmit()">Delete</button>
        <button  onclick="document.getElementById('order-product-modal4').style.display='none'">Cancel</button>
      </div>
       
    </div>

</div>

<script>
  
var modal_add_product = document.getElementById('order-product-modal1');
var modal_complete = document.getElementById('order-product-modal2');
var modal_update = document.getElementById('order-product-modal3');
var modal_delete = document.getElementById('order-product-modal4');


window.onclick = function(event) {
  if(event.target == modal_complete){
    modal_complete.style.display = "none";
  }else if(event.target == modal_update){
    modal_update.style.display = "none";
  }else if(event.target == modal_add_product){
    modal_add_product.style.display = "none";
  }else if(event.target == modal_delete){
    modal_delete.style.display = "none";
  }
}

function deleteSubmit() {
  document.getElementById("deleteForm").submit();
}
function addproductSubmit() {
  document.getElementById("addproductForm").submit();
}
function completeSubmit() {
  document.getElementById("completeForm").submit();
}
function updateSubmit() {
  document.getElementById("updateForm").submit();
}

</script>