<h3>Add New Product</h3>

<div id="form-block-product">
    <form method="POST" action="processes/process.product.php?action=new_product">

        <div id="form-block-half2">

          <div class ="block2" id="block2-top">
            <div class="sub-block">
              <label class="productname"for="pname">Product Name</label>
              <input type="text" id="pname" class="input" name="productname" placeholder="Product Name..">
            </div>

            <div class="sub-block">
              <label class="productprice"for="productprice">Product Price</label>
              <input type="number" id="price" class="input" name="productprice" placeholder="Product Price..">
            </div>
          </div>

          <div class ="block2" id="block2-bottom">
            <div class="sub-block2">
              <label class="productdesc"for="pdesc">Description</label>
              <textarea type="text" id="pdesc" class="input" name="productdesc" placeholder="Description.."></textarea>
            </div>
          </div>

          <div id="button-block2">
            <input type="submit" value="Add New Product">
          </div>
        </div>
        
    </form>
</div>

