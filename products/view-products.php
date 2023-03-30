
<div class="page-top-nav">
    <label id="nav-search" for="nav-search">Search</label>
    <input type="text" id="nav-search-input" name="nav-search">
  </div>
  
  <div class="table-products">
    <table id="product-list">
      <tr>
        <th class="id">#</th>
        <th class="name">Product Name</th>
        <th class="price">Product Price</th>
        <th class="desc">Description</th>
        <th class="status">Status</th>
      </tr>
<?php
$count = 1;
if($product->list_products() != false){
foreach($product->list_products() as $value){
   extract($value);
  
?>
      <tr>
        <td class="center"><?php echo $count;?></td>
        <td><a href="index.php?page=products&action=profile&id=<?php echo $product_id;?>"><?php echo $product_name;?></a></td>
        <td><?php echo $product_price;?></td>
        <td><?php echo $product_desc;?></td>
        <td><?php if($product_status == "0"){echo "Available";}else{echo "Not Available";};?></td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{?>
  <h4 id="no-record-notif">NO RECORD FOUND </h4>
 <?php }
?>
    </table>
  </div>

