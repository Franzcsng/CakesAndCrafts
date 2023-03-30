<h3>Provide Order Information</h3>

<div id="form-block-order">
    <form method="POST" action="processes/process.order.php?action=add">
        <div id="form-block-order-center">

            <div class="block1">
              <div class="sub-block">
                <label class="lblorderclient "for="clientfname">First Name</label>
                <input type="text" id="clientfname" name="clientfname" placeholder="Client's First Name..">
              </div>
              
              <div class="sub-block">
                <label class="lblorderproduct" for="clientlname">Last Name</label>
                <input type="text" id="clientlname" name="clientlname" placeholder="Client's Last Name..">
              </div>
            </div>
              
              
            <div class="block1">

              <div class="sub-block">
                <label class="lblorderamount" for="clientphone">Client's Contact No.</label>
                <input type="number" id="clientphone" name="clientphone" placeholder="Client's Mobile..">
              </div>

              <div class="sub-block">
                <label class="lblreceivedby" for="receivedby">Client's Email</label>
                <input type="email" id="clientphone" name="clientemail" placeholder="client@mail.com">
              </div>
              
            </div>

            <div class="block2" id="block2-bottom">
    
            </div>

            <div id="button-block">
              <input type="submit" value="Save Order">
            </div>

        </div>

       
    </form>
</div>