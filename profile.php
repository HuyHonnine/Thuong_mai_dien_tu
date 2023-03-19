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
                <h3 class="space_h3 heading_new">Thông Tin Cá Nhân</h3>
            </div>

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
                <tr>
                    <td>Zipcode</td>
                    <td>:</td>
                    <td><?php echo $result['zipcode']?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>

            <div class="btn_payment">
                <a href="editprofile.php"><input type="submit" name="save" value="Chỉnh Sửa Thông Tin"></input></a>
            </div>
        </div>
    </div>
</div>

<?php
	include 'inc/footer.php';
	?>