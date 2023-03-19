<?php
	include 'inc/header.php';
?>
<?php
	if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
		echo "<script>window.location = '404.php'</script>";
	} else {
		$id = $_GET['catid'];
	}

	

	// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// 	$catName = $_POST['catName'];
	// 	$updateCat = $cat->update_category($catName, $id);
	// }
?>

<div class="main">
    <div class="content">
        <div class="content_top">
            <?php
            $getnamebycat = $cat->get_name_by_cat($id);
            if ($getnamebycat) {
                $result_name = $getnamebycat->fetch_assoc();
            ?>
            <div class="heading">
                <h3>Category: <?php echo $result_name['catName']?></h3>
            </div>
            <?php
			}
			?>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            $getproductbycat = $cat->get_product_by_cat($id);
            if ($getproductbycat) {
            while ($result = $getproductbycat->fetch_assoc()) {
            ?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></a>
                <h2><?php echo  $fm->textShorten($result['productName'], limit: 30)?></h2>
                <p><?php echo  $fm->textShorten($result['product_desc'], limit: 100)?></p>
                <p><span class="price"><?php echo $result['price']?></span></p>
                <div class="button"><span><a href="detail.php?proid=<?php echo $result['productId'] ?>"
                            class="details">Details</a></span></div>
            </div>
            <?php
			}
		}else{
			echo '';
			$msg = "<span class='erorr'>Category Not Avaiable</span>";
            return $msg;
		}
			?>
        </div>
    </div>
</div>

<?php
	include 'inc/footer.php';
?>