
//view.profile.php script functions and variables for modals
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
//product-profile.php script functions and variables for modals
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

function enableProductSubmit() {
    window.location.href = "processes/process.product.php?action=status&id=<?php echo $id;?>&status=0";
}
function disableProductSubmit() {
    window.location.href = "processes/process.product.php?action=status&id=<?php echo $id;?>&status=1";
}
function priceSubmit() {
  document.getElementById("priceForm").submit();
}
function descSubmit() {
  document.getElementById("descForm").submit();
}
//add.order.items.php script functions and variables modals
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
