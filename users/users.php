<?php
include_once 'classes/class.user.php';
/* instantiate class object */
$user = new User();
?>
<div class="content-main">
    <div class="subclass-nav">
        <div class="subnav-block"><a href="index.php?page=users&action=view">view users</a></div>
        <div class="subnav-block"><a href="index.php?page=users&action=create">create user</a></div>
    </div>

    <div class="content-main2">
    <?php
                switch($action){
                case 'create':
                    require_once 'users/create-user.php';
                break; 
                case 'profile':
                    require_once 'users/view-profile.php';
                break;
                case 'view':
                    require_once 'users/view-users.php';
                break; 
                default:
                    require_once 'users/view-users.php';
                break;
            }
    ?>
    </div>
    
</div>