<div class="content-main2">
<div class="page-top-nav">
    <label id="nav-search" for="nav-search">Search</label>
    <input type="text" id="nav-search-input" name="nav-search">
  </div>
    <div class="table-couriers">
      <table id="couriers-list">
        <tr>
          <th class="id">#</th>
          <th class="name">Name</th>
          <th class="phone">contact</th>
        </tr>
<?php
// CALLS LIST FUNCTION OF COURIERS TO DISPLAY DATA 
$count = 1;
if($courier->list_couriers() != false){
foreach($courier->list_couriers() as $value){
   extract($value);
  
?>
        <tr>
          <td class="center"><?php echo $count;?></td>
          <td><?php echo $courier_name;?></td>
          <td class="center"><?php echo $courier_contact;?></td>
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
</div>