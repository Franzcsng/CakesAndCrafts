
<h3>Enter Product Information</h3>

<div id="form-block-product">
    <form method="POST" action="processes/process.p.php?action=update">
        <div id="form-block-half2-product">

          <div class ="block2" id="block2-top">
            <div class="sub-block">
              <label class="pname"for="pname">Product Name</label>
              <input type="text" id="pname" class="input" name="firstname" disabled value="<?php echo $product->get_product_name($id);?>" placeholder="Product Name">
            </div>   

            <div class="sub-block">
              <label class="price"for="price">Price</label>
              <input type="price" id="price" class="input" name="email" disabled value="<?php echo $product->get_product_price($id);?>" placeholder="Product Price">
            </div>
          </div>

          <div class ="block2">
            <div class="sub-block2">
              <label class="pdesc"for="pdesc">Description</label>
              <input type="text" id="pdesc" class="input" name="lastname"  disabled value="<?php echo $product->get_product_desc($id);?>" placeholder="Description">
            </div>
          </div>

          <div class ="block2" id="block2-bottom">
            <div class="sub-block">
              <label class="pstatus" for="pstatus">Product Status</label>
              <select id="pstatus" name="pstatus" disabled>
                <option <?php if($product->get_product_status($id) == "0"){ echo "selected";};?>>available</option>
                <option <?php if($product->get_product_status($id) == "1"){ echo "selected";};?>>not available</option>
              </select>   
            </div> 

          </div>
          
          <div class ="sub-block-edit">
             <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
              <div class="profile">
                <a onclick="document.getElementById('product-modal1').style.display='block'" >Change Price</a> 
                <a onclick="document.getElementById('product-modal2').style.display='block'" >Change Description</a> 
             
             <?php
             if($product->get_product_status($id) == "0"){
               ?>
                <a onclick="document.getElementById('product-modal3').style.display='block'">Disable Product</a>
                <?php
             }else{
             ?>
                <a onclick="document.getElementById('product-modal3').style.display='block'">Activate Product</a>
             <?php
              }
              ?>
            
              </div>
            </div>
        </div>
          
    </form>
</div>


<div id="product-modal1" class="modal">
    <div id="product-modal-content" class="modal-content">
        <div class="modal-text">
          <h1> Change Product Price </h1>
        </div>

        <form method="POST" id="priceForm" action="processes/process.product.php?action=changeprice">
          <div class="modal-block" id="modal-block-product">
            <input type="hidden" id="productid" name="productid" value="<?php echo $id;?>"/>
            <label class="prodprice-lbl" for="prodprice">New Price</label>
            <input type="number" id="prodprice" class="input" name="prodprice" placeholder="New Price..."> 
          </div>
                   
          <div class="modal-block">
            <button class="submitbtn" id="product-submitbtn" onclick="priceSubmit()">Confirm</button>
          </div>     
        </form> 

          <button class="cancelbtn" id="product-cancelbtn" onclick="document.getElementById('product-modal1').style.display='none'">Cancel</button>
    </div>
</div>

          
<div id="product-modal2" class="modal">
    <div id="product-modal-content" class="modal-content">
        <div class="modal-text">
          <h1> Change Product Description </h1>
        </div>

        <form method="POST" id="descForm" action="processes/process.product.php?action=changedesc">
          <div class="modal-block" id="modal-block-product2">
            <input type="hidden"id="productid" name="productid" value="<?php echo $id;?>"/>
            <label class="productdesc-lbl" for="productdesc">New Description</label>
            <textarea type="text" id="pdesc" class="input" name="productdesc" placeholder="Description.."></textarea>
          </div>
               
          <div class="modal-block">
            <button class="submitbtn" id="product-submitbtn" onclick="descSubmit()">Confirm</button>
          </div>     
        </form> 

            <button class="cancelbtn" id="product-cancelbtn2"onclick="document.getElementById('product-modal2').style.display='none'">Cancel</button>
    </div>
</div>


<div id="product-modal3" class="modal">
    <div id="product-modal-content3" class="modal-content">
        <div class="modal-text">
          <h1> Activate/Deactivate Product </h1>
        </div>

        <form method="POST" id="statusForm" action="processes/process.product.php?action=status">
          <div class="modal-block" id="modal-block-product3">
            <input type="hidden" id="productid" name="productid" value="<?php echo $id;?>"/>
        <?php
         if($product->get_product_status($id) == "0"){
         ?>
         <h2> Are you sure you want to Deactivate this product? </h2>
         <button class="confirmbtn" id="product-submitbtn" onclick="disableSubmit()">Confirm</button>
         <?php }else if($product->get_product_status($id) == "1"){?>
          <h2> Are you sure you want to Activate this product? </h2>
          <button class="confirmbtn"id="product-submitbtn" onclick="enableSubmit()">Confirm</button>
        <?php };?> 
          </div>
              
        </form> 

            <button class="cancelbtn" id="product-cancelbtn3" onclick="document.getElementById('product-modal3').style.display='none'">Cancel</button>
    </div>
</div>


          <script>
var modal_price = document.getElementById('product-modal3');
var modal_desc = document.getElementById('product-modal2');
var modal_status = document.getElementById('product-modal1');


window.onclick = function(event) {
  if(event.target == modal_price){
    modal_price.style.display = "none";
  }else if(event.target == modal_desc){
    modal_desc.style.display = "none";
  }else if(event.target == modal_status){
    modal_status.style.display = "none";
  }
}

function enableSubmit() {
    window.location.href = "processes/process.product.php?action=status&id=<?php echo $id;?>&status=0";
}
function disableSubmit() {
    window.location.href = "processes/process.product.php?action=status&id=<?php echo $id;?>&status=1";
}
function priceSubmit() {
  document.getElementById("priceForm").submit();
}
function descSubmit() {
  document.getElementById("descForm").submit();
}
</script>