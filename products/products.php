<?php
include_once 'classes/product.class.php';
/* instantiate class object */
$product = new Product();
?>
<div class="content-main">
    <div class="subclass-nav">
        <a href="index.php?page=products&action=view">products</a>
        <a href="index.php?page=products&action=create">add product</a>
    </div>

    <div class="content-main2">
    <?php
                switch($action){
                case 'create':
                    require_once 'products/create-product.php';
                break; 
                case 'profile':
                    require_once 'products/product-profile.php';
                break;
                case 'view':
                    require_once 'products/view-products.php';
                break; 
                default:
                    require_once 'products/view-products.php';
                break;
            }
    ?>
    </div>
    
</div>