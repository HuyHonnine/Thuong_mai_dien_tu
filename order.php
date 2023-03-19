<?php
include 'inc/header.php';
?>
<?php
    $login_check = Session::get('customer_login');
    if($login_check==false){
    echo "<script> window.location.href='login.php';</script>";
}
?>
<style>
.order_page {
    color: red;
    font-weight: 700;
    font-size: 1.5rem;
}
</style>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Your Cart</h2>
                <div class="order_page">
                    <h3>Order Page</h3>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php
include 'inc/footer.php';
?>