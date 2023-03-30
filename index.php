<?php
include_once 'classes/class.user.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] !='') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] !='') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] !='') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

/* GET SESSION OF A USER EXISTING IN THE DATABASE (NO USER -> NO SESSION -> CANNOT LOG-IN -> REDIRECT TO LOG-IN PAGE) */

$user = new User();
if(!$user->get_session()){
	header("location: log-in.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);

?>

<!DOCTYPE html>
    <html>
        <head>
            <title> Cakes & Crafts by Nza & Lay</title>
            <link rel="stylesheet" href="css/style.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto+Slab&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
            <script src="javascript/script.js"></script>
        </head>
    <body>
        <div class="header">
            <h1>Cakes & Crafts <span>by Nza & Lay</span></h1>
            <div class="nav">
                <a href="index.php">home</a>
                <a href="index.php?page=orders">orders</a>
                <a href="index.php?page=products">products</a>
                <a href="index.php?page=settings">settings</a>
                <h4 class="nav-name">Welcome, <?php echo $user->get_user_firstname($user_id);?>!</h4>
            </div>
        </div>
    <div class="content">
        <?php
                switch($page){
                case 'orders':
                    require_once 'orders/orders.php';
                break; 
                case 'products':
                    require_once 'products/products.php';
                break; 
                case 'settings':
                    require_once 'settings.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
    </div>

    <footer>
            <div class="footer-block">
                <div class="footer-head">
                    <h3>About</h3>
                </div>
                <div class="footer-content">
                    <p>Cakes & Crafts by Nza & Lay Order Management System is a efficient system used to aid the owners
                        and managers of the business. It conveniently allows the user to create orders and provide users order reports.
                    </p>
                </div>
            </div>

            <div class="footer-div"></div>

            <div class="footer-block">
            <div class="footer-head">
                    <h3>More Information</h3>
                </div>
                <div class="footer-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
                </div>
            </div>

            <div class="footer-div"></div>
                
            <div class="footer-block">
            <div class="footer-head">
                    <h3>Contact Us</h3>
                </div>
                <div class="footer-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
                </div>
            </div>

    </footer>

    </body>
    </html>