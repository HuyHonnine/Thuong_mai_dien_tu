<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
$login_check = Session::get('customer_login');
if($login_check==false){
    echo "<script> window.location.href='login.php';</script>";
}

// if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
// 	echo "<script>window.location = '404.php'</script>";
// } else {
// 	$id = $_GET['proid'];
// }
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//     $quantity = $_POST['quantity'];
//     $AddtoCart = $ct->add_to_cart($quantity,$id);
// }
?>
<div class="main">
    <div class="content">
        <div class="section group wrap_new">
            <div class="heading">
                <h3 class="space_h3 heading_new">Chọn Phương Thức Thanh Toán</h3>
            </div>
        </div>
        <div class="container_payment">

            <div class="box_payment">
                <div class="method_payment"><a href="offlinepayment.php">Thanh Toán Khi Nhận Hàng (Offline)</a></div>
                <div class="method_payment"><a href="onlinepayment.php">Thanh Toán Trực Tuyến (Online)</a></div>
            </div>
            <div class="exit_payment">
                <a href="cart.php"><i class="ri-arrow-left-line"></i>Thoát khỏi trang</a>
            </div>
        </div>
    </div>
</div>
</div>

<?php include 'inc/footer.php';?>