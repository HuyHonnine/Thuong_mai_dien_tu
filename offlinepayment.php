<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
	$customer_id = Session::get('customer_id');
    $insert_order = $ct->insert_order($customer_id);
    $delcart=$ct->dell_data_cart();
    echo "<script> window.location.href='success.php';</script>";
}
?>
<form action="" method="POST">
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="section group wrap_new">
                    <div class="heading">
                        <h3 class="space_h3 heading_new">Thanh Toán Khi Nhận Hàng (Offline)</h3>
                    </div>
                </div>
            </div>
            <div class="container_bill">
                <div class="bill_left">
                    <div class="box_bill">
                        <div class="heading_bill">
                            <h3>Giỏ Hàng Của Bạn</h3>
                        </div>
                        <?php
                       if (isset($update_quantity_cart)) {
                        echo $update_quantity_cart;
                        }   
                    ?>
                        <?php
                        if (isset($delcart)) {
                            echo $delcart;
                        }
                    ?>
                        <table class="tblone">
                            <tr class="bill_details">
                                <th width="5%">ID</th>
                                <th width="25%">Tên</th>
                                <th width="20%">Hình Ảnh</th>
                                <th width="25%">Giá</th>
                                <th width="5%">SL</th>
                                <th width="30%">Tổng tiền</th>
                            </tr>
                            <?php
                            $get_product_cart = $ct->get_cart();
                            $subtotal = 0;
                            $qty = 0;
                            $i=0;
                            if ($get_product_cart) {
                                while ($result = $get_product_cart->fetch_assoc()) {
                                    $i++;
                        ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $result['productName']?></td>
                                <td><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></td>
                                <td><?php echo $result['price']." "."VNĐ"?></td>
                                <td><?php echo $result['quantity']?></td>
                                <td>
                                    <?php
                            $total = $result['price']*$result['quantity'];
                            echo $total." "."VNĐ";
                            ?>
                                </td>
                            </tr>
                            <?php
                            $subtotal += $total;
                            $qty = $qty + $result['quantity'];
                                }
                            }
                        ?>
                        </table>
                        <?php
                        $check_cart =$ct->check_cart();
                            if($check_cart){
                    ?>
                        <table style="float:right;text-align:left;" width="40%">
                            <tr>
                                <th>Sub Total : </th>
                                <td><?php
                            echo $subtotal." "."VNĐ";
                            Session::set('sum', $subtotal);
                            Session::set('qty', $qty);
                        ?></td>
                            </tr>
                            <tr>
                                <th>Thuế (VAT): </th>
                                <td>5% (<?php echo $vat = $subtotal * 0.05?>)</td>
                            </tr>
                            <tr>
                                <th>Tổng:</th>
                                <td><?php
                            $vat = $subtotal * 0.05;
                            $gtotal = $vat + $subtotal;
                            echo $gtotal." "."VNĐ";
                        ?>
                                </td>
                            </tr>
                        </table>
                        <?php
                    }
                    else{
                        echo "<span class='erorr'>Your Cart Is Emty, Please Shopping Now!</span>";
                    }
                ?>
                    </div>
                </div>
                <div class="bill_right">
                    <table class="tblone">
                        <?php
                   $id = Session::get('customer_id'); 
                    $get_customer = $cs->show_cs($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){
                ?>
                        <tr>
                            <td>Họ Tên</td>
                            <td>:</td>
                            <td><?php echo $result['name']?></td>
                        </tr>
                        <tr>
                            <td>Số Điện Thoại</td>
                            <td>:</td>
                            <td><?php echo $result['phone']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $result['email']?></td>
                        </tr>
                        <tr>
                            <td>Tỉnh Thành</td>
                            <td>:</td>
                            <td><?php echo $result['country']?></td>
                        </tr>
                        <tr>
                            <td>Thành Phố</td>
                            <td>:</td>
                            <td><?php echo $result['city']?></td>
                        </tr>
                        <tr>
                            <td>Địa Chỉ</td>
                            <td>:</td>
                            <td><?php echo $result['address'] ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                    </table>
                </div>
            </div>
            <div class="btn_order">
                <a href="?orderid=order">Xác Nhận Đặt Hàng</a>
            </div>
        </div>
    </div>
</form>

<?php
	include 'inc/footer.php';
	?>