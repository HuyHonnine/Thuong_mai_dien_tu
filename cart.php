<?php
	include 'inc/header.php';
	// include'inc/slider.php';
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $update_quantity_cart = $ct->update_quantity_cart($quantity,$cartId);
        if ($quantity<=0) {
            $delcart = $ct->del_product_cart($cartId);
        }
    }   

    if (isset($_GET['cartid'])) {
        $cartid = $_GET['cartid'];
        $delcart = $ct->del_product_cart($cartid);
}
?>
<?php
    if(!isset($_GET['id'])){
        echo"<meta http-equiv = 'refresh' content='0;URL=?id=live'>";
    }
?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <div class="heading">
                    <h3 class="space_h3 heading_new">Giỏ Hàng Của Bạn</h3>
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
                    <tr>
                        <th width="20%">Product Name</th>
                        <th width="10%">Image</th>
                        <th width="15%">Price</th>
                        <th width="25%">Quantity</th>
                        <th width="20%">Total Price</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php
                        $get_product_cart = $ct->get_cart();
                        $subtotal = 0;
                        $qty = 0;
                        if ($get_product_cart) {
                            while ($result = $get_product_cart->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $result['productName']?></td>
                        <td><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></td>
                        <td><?php echo $result['price'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="cartId" min="1" value="<?php echo $result['cartId'] ?>" />
                                <input type="number" name="quantity" min="0"
                                    value="<?php echo $result['quantity'] ?>" />
                                <input type="submit" name="submit" value="Update" />
                            </form>
                        </td>
                        <td>
                            <?php
                            $total = $result['price']*$result['quantity'];
                            echo $total;
                            ?>
                        </td>
                        <td><a href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
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
                            echo $subtotal;
                            Session::set('sum', $subtotal);
                            Session::set('qty', $qty);
                        ?></td>
                    </tr>
                    <tr>
                        <th>VAT : </th>
                        <td>5%</td>
                    </tr>
                    <tr>
                        <th>Grand Total :</th>
                        <td><?php
                            $vat = $subtotal * 0.05;
                            $gtotal = $vat + $subtotal;
                            echo $gtotal;?>
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
            <div class="shopping">
                <div class="shopleft">
                    <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                </div>
                <div class="shopright">
                    <a href="payment.php"> <img src="images/check.png" alt="" /></a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>


<?php
	include 'inc/footer.php';
?>