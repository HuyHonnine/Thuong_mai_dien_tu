<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
	echo "<script>window.location = '404.php'</script>";
} else {
	$id = $_GET['proid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $AddtoCart = $ct->add_to_cart($quantity,$id);
}
?>
<div class="main">
    <div class="content">
        <div class="section group">
            <?php
			$get_product_details = $product->get_details($id);
			if ($get_product_details) {
				while ($result_details = $get_product_details->fetch_assoc()) {

			?>
            <div class="cont-desc span_1_of_2">
                <div class="grid images_3_of_2">
                    <img src="admin/uploads/<?php echo $result_details['image']?>" alt="" />
                </div>
                <div class="desc span_3_of_2">
                    <h2><?php echo $result_details['productName'] ?></h2>
                    <p><?php echo $fm->textShorten($result_details['product_desc'], limit: 500) ?></p>
                    <div class="price">
                        <p>Giá thành:
                            <span
                                class="price"><?php echo $fm->format_currency($result_details['price']) . "VNĐ" ?></span>
                        </p>
                        <p>Danh Mục: <span><?php echo $result_details['catName'] ?></span></p>
                        <p>Thương Hiệu: <span><?php echo $result_details['brandName'] ?></span></p>
                    </div>
                    <div class="add-cart">
                        <form action="" method="post">
                            <input type="number" class="buyfield" name="quantity" value="1" min='1' />
                            <input type="submit" class="buysubmit" name="submit" value="Mua Ngay" />
                        </form>
                    </div>
                    <?php
                        if(isset($AddtoCart)){
                            echo $AddtoCart;
                        }
                    ?>
                </div>

                <div class="product-desc">
                    <h2>Chi Tiết Sản Phẩm</h2>
                    <p><?php echo $fm->textShorten($result_details['product_desc'], limit: 100000) ?></p>

                </div>
            </div>
            <?php
				}
			}
			?>

            <div class="rightsidebar span_3_of_1">
                <h2>Danh Mục</h2>
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
    </div>

    <?php
	include 'inc/footer.php';
	?>