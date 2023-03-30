<h3>Enter User Information</h3>

<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=new">
      <div id="form-block-half">

        <div class ="block1" id="block1-top">
          <div class="sub-block">
            <label class="fname"for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="Your name..">
          </div>

          <div class="sub-block">
            <label class="lname"for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">
          </div>
        </div>

        <div class ="block1">
          <div class="sub-block">
            <label class="email"for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email..">
          </div>

          <div class="sub-block">
            <label class="phone"for="phone">Mobile No.</label>
            <input type="tel" id="phone" class="input" name="phone" placeholder="contact no.">
          </div>
        </div> 
    
        <div class ="block1" id="block1-bottom">
          <div class="sub-block">
            <label class="pass"for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password..">
          </div>

          <div class="sub-block">
            <label class="confirm"for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password..">
          </div>
        </div>
        
        <div id="button-block-user">
          <input type="submit" value="Add New User">
        </div>
    </div>
  </form>
</div>
