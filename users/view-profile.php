
<h3>Enter User Information</h3>

<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=update">
        <div id="form-block-half">
          <div class ="block1">
            <div class="sub-block">
              <label class="fname"for="fname">First Name</label>
              <input type="text" id="fname" class="input" name="firstname" disabled value="<?php echo $user->get_user_firstname($id);?>" placeholder="Your name..">
            </div>

            <div class="sub-block">
              <label class="lname"for="lname">Last Name</label>
              <input type="text" id="lname" class="input" name="lastname"  disabled value="<?php echo $user->get_user_lastname($id);?>" placeholder="Your last name..">
            </div>
          </div>

          <div class ="block1">
            <div class="sub-block">
              <label class="email"for="email">Email</label>
              <input type="email" id="email" class="input" name="email" disabled value="<?php echo $user->get_user_email($id);?>" placeholder="Your email..">
            </div>

            <div class="sub-block">
              <label class="phone"for="phone">Mobile No.</label>
              <input type="tel" id="phone" class="input" name="phone" disabled value="<?php echo $user->get_user_phone($id);?>" placeholder="contact no.">
            </div>
          </div>
          
          <div class ="block1" id="block1-bottom">
            <div class="sub-block">
              <label class="status" for="status">Account Status</label>
              <select id="status" name="status" disabled>
                <option <?php if($user->get_user_status($id) == "1"){ echo "selected";};?>>Deactivated</option>
                <option <?php if($user->get_user_status($id) == "0"){ echo "selected";};?>>Active</option>
              </select>
            </div>

            <div class="sub-block">
            </div>
          
            
            </div>
            <div class ="sub-block-edit">
              <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
                <div class="profile">
                  <a  onclick="document.getElementById('user-modal1').style.display='block'" >Change Email</a> 
                  <a  onclick="document.getElementById('user-modal2').style.display='block'"> Change Password</a> 
            <?php
            if($user->get_user_status($id) == "0"){
              ?>
                <a onclick="document.getElementById('user-modal3').style.display='block'">Disable Account</a>
              <?php
            }else{
            ?>
                <a onclick="document.getElementById('user-modal3').style.display='block'">Activate Account</a>
            <?php
            }
            ?>
                </div>
          </div>

            
        </div>  
  </form>
</div>
     
<div id="user-modal1" class="modal">
  <div id="user-modal-content" class="modal-content">
      <div class="modal-text">
        <h1> Change user email </h1>
      </div>

      <form method="POST" id="emailForm" action="processes/process.user.php?action=updateemail">
        <div class="modal-block">
          <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
          <label class="useremail-lbl" for="useremail">Current Email</label>
          <input type="email" id="useremail" class="input" name="useremail" placeholder="Current Email"> 
        </div>

        <div class="modal-block">
          <label class="newemail-lbl"for="newemail">New Email</label>
          <input type="email" id="newemail" class="input" name="newemail" placeholder="New Email">
        </div>      

        <div class="modal-block">
          <button class="submitbtn" onclick="emailSubmit()">Confirm</button>
        </div>     
       </form> 

        <button class="cancelbtn" onclick="document.getElementById('user-modal1').style.display='none'">Cancel</button>
    </div>
</div>

          
<div id="user-modal2" class="modal">
  <div id="user-modal-content" class="modal-content">
      <div class="modal-text">
        <h1> Change user password </h1>
      </div>

      <form method="POST" id="passwordForm" action="processes/process.user.php?action=updatepassword">
        <div class="modal-block">
          <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
          <label class="userpassword-lbl" for="userpassword">Current Password</label>
          <input type="password" id="userpassword" class="input" name="userpassword" placeholder="Current Password"> 
        </div>

        <div class="modal-block">
          <label class="newpassword-lbl"for="newpassword">New Password</label>
          <input type="password" id="newpassword" class="input" name="newpassword" placeholder="New Password">
        </div>   

        <div class="modal-block">
          <button class="submitbtn" onclick="passwordSubmit()">Confirm</button>
        </div>  
      </form> 

      <button class="cancelbtn" onclick="document.getElementById('user-modal2').style.display='none'">Cancel</button>
  </div>
</div>


<div id="user-modal3" class="modal">
  <div id="user-modal-content3" class="modal-content">
    <div class="modal-text">
      <h1> Activate/Deactivate user </h1>
    </div>

    <form method="POST" id="statusForm" action="processes/process.user.php?action=status">
      <div class="modal-block">
        <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
        
        <?php
         if($user->get_user_status($id) == "0"){
         ?>
         <h2> Are you sure you want to Deactivate this user? </h2>
         <button class="confirmbtn" onclick="disableSubmit()">Confirm</button>
         <?php }else if($user->get_user_status($id) == "1"){?>
          <h2> Are you sure you want to Activate this user? </h2>
          <button class="confirmbtn" onclick="enableSubmit()">Confirm</button>
        <?php };?> 
      </div>
    </form> 
      <button class="cancelbtn" onclick="document.getElementById('user-modal3').style.display='none'">Cancel</button>
  </div>
</div>



<script>
  
var modal_user_status = document.getElementById('user-modal3');
var modal_password = document.getElementById('user-modal2');
var modal_email = document.getElementById('user-modal1');


window.onclick = function(event) {
  if(event.target == modal_password){
    modal_password.style.display = "none";
  }else if(event.target == modal_email){
    modal_email.style.display = "none";
  }else if(event.target == modal_status){
    modal_user_status.style.display = "none";
  }
}

function enableSubmit() {
    window.location.href = "processes/process.user.php?action=status&id=<?php echo $id;?>&status=0";
}
function disableSubmit() {
    window.location.href = "processes/process.user.php?action=status&id=<?php echo $id;?>&status=1";
}
function passwordSubmit() {
  document.getElementById("passwordForm").submit();
}
function emailSubmit() {
  document.getElementById("emailForm").submit();
}

</script>