<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
// if (!isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
// 	$customer_id = Session::get('customer_id');
//     $insert_order = $ct->insert_order($customer_id);
//     $delcart = $ct->dell_data_cart();
//     header('Location:success.php');
// }
?>
<form action="" method="POST">
    <div class="main">
        <div class="content">
            <div class="section group success_order">
                <h2>Đơn Hàng Của Bạn Đã Hoàn Tất Xác Nhận</h2>
                <?php
                    $customer_id = Session::get('customer_id');
                    $get_amout = $ct->get_amout($customer_id);
                    if($get_amout){
                        $amout = 0;
                        while($result = $get_amout->fetch_assoc()){
                            $price = $result['price'];
                            $amout += $price;
                        }
                    }
                ?>
                <p>Tổng tiền mà bạn cần phải trả cho đơn hàng là: <span>
                        <?php
                            $vat = $amout*0.1;
                            echo $vat + $amout;
                        ?>
                    </span></p>
                <p>Đơn hàng của bạn sẽ đến với tay bạn sớm nhất có thể! Bạn có thể kiểm tra đơn hàng <a
                        href="orderdetails.php">Tại Đây!</a>
                </p>
            </div>
        </div>
    </div>
</form>

<?php
	include 'inc/footer.php';
	?>