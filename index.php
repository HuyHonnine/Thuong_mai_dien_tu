<?php
include 'inc/header.php';
include 'inc/slider.php';
?>

<div class="main">

    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3 class="space_h3">Sản Phẩm Nổi Trội</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="container">
            <?php
            $product_featherd = $product->getproduct_fearthered();
            if ($product_featherd) {
                $i=0;
                while ($i<4 && $result = $product_featherd->fetch_assoc()) {
                    $i++;
            ?>
            <div class="grid_1_of_4 images_1_of_4">
                <div class="featherd_product_img">
                    <a href="detail.php?proid=<?php echo $result['productId']?>"><img
                            src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
                </div>
                <div class="featherd_product_content">
                    <h2><?php echo $fm->textShorten($result['productName'], limit: 30) ?></h2>
                    <p><?php echo $fm->textShorten($result['product_desc'], limit: 100) ?></p>
                    <p><span class="price"><?php echo $fm->format_currency($result['price']) . "VNĐ" ?></span></p>
                </div>
                <div class="button"><span><a href="detail.php?proid=<?php echo $result['productId'] ?>"
                            class="details">Xem</a></span></div>
            </div>
            <?php
                }
            }
            ?>

        </div>
        <div class=" content_bottom">
            <div class="heading">
                <h3 class="space_h3">Sản Phẩm Mới</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            $product_new = $product->getproduct_new();
            if ($product_new) {
                $i=0;
                while ($i<4&&$result_new = $product_new->fetch_assoc()) {
                    $i++;
            ?>
            <div class="grid_1_of_4 images_1_of_4">
                <div class="featherd_product_img">
                    <a href="detail.php?proid=<?php echo $result_new['productId'] ?>"><img
                            src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
                </div>
                <div class="featherd_product_content">
                    <h2><?php echo $fm->textShorten($result_new['productName'], limit: 30)?></h2>
                    <p><?php echo $fm->textShorten($result_new['product_desc'], limit: 100) ?></p>
                    <p><span class="price"><?php echo $fm->format_currency($result['price']) . "VNĐ" ?></span></p>
                </div>
                <div class="button"><span><a href="detail.php?proid=<?php echo $result_new['productId'] ?>"
                            class="details">Xem</a></span></div>
            </div>
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