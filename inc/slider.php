<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="brand_container">
            <div class="section group">
                <?php
                $getLastestAp = $product->getLastestAp();
                if($getLastestAp){
                    while($result_ap = $getLastestAp->fetch_assoc()){
            
            ?>
                <div class="listview_1_of_2 images_1_of_2">
                    <div class="listimg listimg_2_of_1">
                        <a href="detail.php?proid=<?php echo $result_ap['productId']?>"> <img
                                src="admin/uploads/<?php echo $result_ap['image']?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2>Apple</h2>
                        <p><?php echo $fm->textShorten($result_ap['productName'], limit: 50)?></p>
                        <div class="button"><span><a
                                    href="detail.php?proid=<?php echo $result_ap['productId']?>">Xem</a></span>
                        </div>
                    </div>
                </div>
                <?php
                }   
            }
            ?>
                <?php
                $getLastestSs = $product->getLastestSs();
                if($getLastestSs){
                    while($result_ss = $getLastestSs->fetch_assoc()){
            
            ?>
                <div class=" listview_1_of_2 images_1_of_2">
                    <div class="listimg listimg_2_of_1">
                        <a href="preview.php"> <img src="admin/uploads/<?php echo $result_ss['image']?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2>Samsung</h2>
                        <p><?php echo $fm->textShorten($result_ss['productName'], limit: 50)?></p>
                        <div class="button"><span><a
                                    href="detail.php?proid=<?php echo $result_ss['productId']?>">Xem</a></span></div>
                    </div>
                </div>
                <?php
                }   
            }
            ?>
            </div>
            <div class="section group">
                <?php
                $getLastestAcer = $product->getLastestAcer();
                if($getLastestAcer){
                    while($result_acer = $getLastestAcer->fetch_assoc()){
            
            ?>
                <div class="listview_1_of_2 images_1_of_2">
                    <div class="listimg listimg_2_of_1">
                        <a href="preview.php"> <img src="admin/uploads/<?php echo $result_acer['image']?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2>Acer</h2>
                        <p><?php echo $fm->textShorten($result_acer['productName'], limit: 50)?></p>
                        <div class="button"><span><a
                                    href="detail.php?proid=<?php echo $result_acer['productId']?>">Xem</a></span></div>
                    </div>
                </div>
                <?php
                }   
            }
            ?>

                <?php
                $getLastestCanon = $product->getLastestCanon();
                if($getLastestCanon){
                    while($result_canon = $getLastestCanon->fetch_assoc()){
            
            ?>
                <div class="listview_1_of_2 images_1_of_2">
                    <div class="listimg listimg_2_of_1">
                        <a href="preview.php"> <img src="admin/uploads/<?php echo $result_canon['image']?>"
                                alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2>Canon</h2>
                        <p><?php echo $fm->textShorten($result_canon['productName'], limit: 50)?></p>
                        <div class="button"><span><a
                                    href="detail.php?proid=<?php echo $result_canon['productId']?>">Xem</a></span></div>
                    </div>
                </div>
                <?php
                }   
            }
            ?>
            </div>
        </div>
        <div class="banner_container">
            <div class="banner_box">
                <img src="images/banner_1.webp" alt="" />
            </div>
            <div class="banner_box">
                <img src="images/banner_2.webp" alt="" />
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="content_top">
        <div class="heading">
            <h3 class="space_h3">Các Thương Hiệu Nổi Bật</h3>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="images/slide_1.png" alt="" /></li>
                    <li><img src="images/slide_2.png" alt="" /></li>
                    <li><img src="images/slide_3.png" alt="" /></li>
                    <li><img src="images/slide_5.webp" alt="" /></li>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>