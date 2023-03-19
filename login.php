<?php
	include 'inc/header.php';
?>
<?php
    $login_check = Session::get('customer_login');
    if($login_check){
        echo "<script> window.location.href='index.php';</script>";
    }
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insert_cs = $cs->insert_csr($_POST);
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $login_cs = $cs->login_cs($_POST);
}
?>

<div class="main">
    <div class="content">
        <div class="login_panel">
            <h3>Đăng Nhập Tài Khoản</h3>
            <p>Đăng nhập để sử dụng nhiều dịch vụ hơn.</p>
            <?php
                if(isset($login_cs)){
					echo $login_cs;
				}
            ?>
            <form action="" method="POST">
                <input type="text" name="email" placeholder="Nhập email của bạn...">
                <input type="password" name="password" placeholder="Nhập mật khẩu của bạn...">
                <p class="note">Nếu như bạn quên Email hoặc Mật Khẩu thì có thể nhấn <a href="#">ở đây!</a></p>
                <div class="buttons">
                    <div><input type="submit" name="login" value="Đăng Nhập" class="btn_login"></div>
                </div>
            </form>
        </div>
        <?php
			
		?>
        <div class="register_account">
            <h3>Tạo Tài Khoản</h3>
            <?php
				if(isset($insert_cs)){
					echo $insert_cs;
				}
			?>
            <form action="" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="name" placeholder="Nhập tên...">
                                </div>

                                <div>
                                    <input type="text" name="city" placeholder="Nhập thành phố...">
                                </div>

                                <div>
                                    <input type="text" name="zipcode" placeholder="Nhập zipcode...">
                                </div>
                                <div>
                                    <input type="text" name="email" placeholder="nhập email...">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="address" placeholder="Nhập nơi ở...">
                                </div>
                                <div>
                                    <select id="country" name="country" onchange="change_country(this.value)"
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
                                </div>

                                <div>
                                    <input type="text" name="phone" placeholder="Nhập số điện thoại...">
                                </div>

                                <div>
                                    <input type="text" name="password" placeholder="Nhập mật khẩu...">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="search">
                    <div><input type="submit" name="submit" value="Tạo tài khoản" class="btn_login"></input>
                    </div>
                </div>
                <p class="terms">Trước khi ấn vào nút tạo tài khoản thì bạn có đồng ý với những <a href="#">điều khoản
                        và điều kiện</a> hay không?
                </p>
                <div class="clear"></div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php
	include 'inc/footer.php';
?>