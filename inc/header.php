<?php
include "./lib/session.php";
Session::init();
?>
<?php
include_once './lib/database.php';
include_once './helpers/format.php';

spl_autoload_register(function($className){
	include_once "classes/".$className.".php";
});

$db = new database();
$fm = new format();
$ct = new cart();
$us = new user();
$cat = new category();
$cs = new customer();
$product = new product();
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>

<head>
    <title>Tech Store Website</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/private.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/footer.css" rel="stylesheet" />
    <link href="css/menu.css" rel="stylesheet" />
    <script src="js/jquerymain.js"></script>
    <script src="/js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/58d0ba52f1.js" crossorigin="anonymous"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

    <script type="text/javascript">
    $(document).ready(function($) {
        $('#dc_mega-menu-orange').dcMegaMenu({
            rowItems: '4',
            speed: 'fast',
            effect: 'fade'
        });
    });
    </script>
</head>

<body>
    <div class="wrap">
        <div class="header_top_private">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="" /></a>
            </div>
            <div class="header_top_right">
                <div class="search_box">
                    <form>
                        <i class="ri-search-2-line icon_search"></i>
                        <input type="text" value="Nhập sản phẩm bạn muốn tìm kiếm...">
                        <input type="submit" value="Tìm Kiếm">
                    </form>

                    <div class="container_recommend">
                        <div class="box_recommend">
                            <p>Iphone 12 Pro max</p>
                            <p>Iphone 12 Pro max</p>
                            <p>Iphone 12 Pro max</p>
                            <p>Iphone 12 Pro max</p>
                            <p>Iphone 12 Pro max</p>
                            <p>Iphone 12 Pro max</p>
                            <p>Iphone 12 Pro max</p>
                        </div>
                    </div>
                </div>
                <div class="shopping_cart">
                    <div class="cart">
                        <i class="icon_header ri-shopping-cart-2-fill"><a href="cart.php" title="View my shopping cart"
                                rel="nofollow">
                                <span class="cart_title">Giỏ</span>
                                <span class="no_product">
                                    <?php
                                $check_cart =$ct->check_cart();
                                if($check_cart){
                                    $qty = Session::get("qty");
                                    $sum = Session::get("sum");
                                    echo $sum.' đ - '."SL: ".$qty;
                                }
                                else{
                                    echo 'Trống';
                                }
                                ?>
                                </span>
                            </a></i>
                    </div>
                </div>
                <?php
                    if(isset($_GET['customer_id'])){
                        $delcart=$ct->dell_data_cart();
                        Session::destroy();
                    }
                ?>
                <div class="login">
                    <?php
                        $login_check = Session::get('customer_login');
                        if($login_check==false){
                            echo'<a href="login.php"><i class="icon_header ri-login-box-line"></i>Login</a>';
                        }
                        else{
                            echo'<a href="?customer_id='.Session::get('customer_id').'"><i class="icon_header ri-logout-box-fill"></i>Đăng Xuất</a>';
                        }  
                    ?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="menu">
            <ul id="dc_mega-menu-orange" class="dc_mm-orange">
                <li><a href="index.php"><i class="icon_header  ri-home-4-line"></i>Trang Chủ</a></li>
                <li><a href="products.php"><i class="icon_header  ri-store-2-line"></i>Sản Phẩm</a></i></li>
                <li class="category_box_hover"><a href="topbrands.php"><i class="icon_header ri-list-check"></i>Danh
                        Mục</a>
                </li>
                <?php
                    $check_cart = $ct->check_cart();
                    if($check_cart==true){
                        echo'<li><a href="cart.php"><i class="icon_header  ri-shopping-cart-2-line"></i>Giỏ Hàng</a></li>';
                    }
                    else{
                        echo'';
                    } 
                ?>
                <?php
                    $login_check = Session::get('customer_login');
                    if($login_check==false){
                        echo'';
                    }
                    else{
                        echo'<li><a href="profile.php"><i class="icon_header ri-file-user-line"></i>Cá Nhân</a></li>';
                    } 
                ?>
                <?php
                    $login_check = Session::get('customer_login');
                    if($login_check==false){
                        echo'';
                    }
                    else{
                        echo'<li><a href="orderdetails.php"><i class="icon_header ri-shopping-basket-line"></i>Đơn Hàng Của Bạn</a></li>';
                    } 
                ?>
                <li><a href="contact.php"><i class="icon_header ri-contacts-fill"></i>Chúng Tôi</a></li>
                <div class="clear"></div>
            </ul>
            <div class="category_box">
                <ul>
                    <?php
                    $getall_cat= $cat->show_category_fontend();
                    if($getall_cat){
                        while($result_allcat = $getall_cat->fetch_assoc()){
                    
                    ?>
                    <li style="list-style: none;"><a
                            href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName']?></a>
                    </li>
                </ul>
                <?php
                        }
                    }
                    ?>
            </div>
        </div>