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
$id = Session::get('customer_id'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $Updatecs = $cs->update_cs($_POST, $id);
}
?>
<div class="main">
    <div class="content">
        <div class="section group edit_profile">
            <div class="heading">
                <h3 class="space_h3 heading_new">Thông Tin Cá Nhân</h3>
            </div>
            <div class="edit_profile_center">
                <form action="" method="post">
                    <table class="tblone">
                        <tr>
                            <?php
                        if(isset($Updatecs)){
                            echo '<td colspan = "3">'.$Updatecs.'</td>';
                        }
                    ?>
                        </tr>

                        <?php
                        $id = Session::get('customer_id'); 
                        $get_customer = $cs->show_cs($id);
                        if($get_customer){
                            while($result = $get_customer->fetch_assoc()){
                    ?>
                        <tr>
                            <td>Họ Tên</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Số Điện Thoại</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="phone" value="<?php echo $result['phone']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Địa Chỉ</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="address" value="<?php echo $result['address']?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Thành Phố</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="city" value="<?php echo $result['city']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Tỉnh Thành</td>
                            <td>:</td>
                            <td>
                                <select style="padding: 0.1rem 1.5rem;
    border-left: 0.1rem solid #a6a6a6;" id="country" name="country" onchange="change_country(this.value)"
                                    class="frm-field required">
                                    <option value="null">Chọn Tỉnh</option>
                                    <option value="Tp. Hồ Chí Minh">Tp. Hồ Chí Minh</option>
                                    <option value="Khánh Hòa">Khánh Hòa</option>
                                    <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                    <option value="Đà Nẵng">Đà Nẵng</option>
                                    <option value="Quãng Bình">Quãng Bình</option>
                                    <option value="Quãng Ngãi">Quãng Ngãi</option>
                                    <option value="Hà Nội">Hà Nội</option>
                                    <option value="Nghệ An">Nghệ An</option>
                                    <option value="Thanh Hóa">Thanh Hóa</option>
                                    <option value="Biên Hòa">Biên Hòa</option>
                                    <option value="Hội An">Hội An</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="email" value="<?php echo $result['email']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="zipcode" value="<?php echo $result['zipcode']?>">
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                    </table>
                    <div class="btn_payment">
                        <input type="submit" name="save" value="Lưu Chỉnh Sửa"></input>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
	include 'inc/footer.php';
	?>