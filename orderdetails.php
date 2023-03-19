<?php
	include 'inc/header.php';
	// include'inc/slider.php';
?>

<?php
    $ct = new cart();
    if (isset($_GET['confirmid'])) {
    $id = $_GET['confirmid'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $shifted_confirm = $ct->shifted_confirm($id, $time, $price);
} 
?>

<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <div class="heading">
                    <h3 class="space_h3 heading_new">Đơn Hàng Của Bạn</h3>
                </div>
                <table class="tblone">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="20%">Tên</th>
                        <th width="15%">Hình</th>
                        <th width="15%">Giá</th>
                        <th width="5%">SL</th>
                        <th width="25%">Ngày Tạo</th>
                        <th width="30%">Trạng Thái</th>
                    </tr>
                    <?php
                        $customer_id = Session::get('customer_id');
                        $get_cart_order = $ct->get_cart_order($customer_id);
                        $qty = 0;
                        $i=0;
                        if ($get_cart_order) {
                            while ($result = $get_cart_order->fetch_assoc()) {
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $result['productName']?></td>
                        <td><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></td>
                        <td><?php echo $result['price'].' '.'VNĐ'?></td>
                        <td><?php echo $result['quantity']?></td>
                        <td><?php echo $fm->formatDate($result['date_order'])?></td>
                        <td><?php if($result['status'] == 0){
                            echo "<span class='erorr'>Chờ Xác Nhận</span>";
                        }elseif($result['status'] == 1){
                            ?>

                            <a
                                href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Xác
                                Nhận</a>

                            <?php                        
                        }else {
                            echo "<span class='success'>Đã Xác Nhận</span>";
                        }
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
                }
                    ?>
                </table>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>


<?php
	include 'inc/footer.php';
?>