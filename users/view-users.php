
<div class="page-top-nav">
    <label id="nav-search" for="nav-search">Search</label>
    <input type="text" id="nav-search-input" name="nav-search">
  </div>
  
  <div class="table-users">
    <table id="user-list">
      <tr>
        <th class="id">#</th>
        <th class="name">Name</th>
        <th class="email">Email</th>
        <th class="phone">Phone</th>
        <th class="status">Status</th>
      </tr>
<?php
$count = 1;
if($user->list_users() != false){
foreach($user->list_users() as $value){
   extract($value);
  
?>
      <tr>
        <td class="center"><?php echo $count;?></td>
        <td><a href="index.php?page=settings&subpage=profile&id=<?php echo $user_id;?>"><?php echo $user_lastname.', '.$user_firstname;?></a></td>
        <td class="center"><?php echo $user_email;?></td>
        <td class="center"><?php echo $user_phone;?></td>
        <td class="center"><?php if($user_status == "0"){echo "Active";}else{echo "Disabled";};?></td>
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
