</div>
<div class="footer" id="footer">
    <div class="footer-container">
        <div class="footer-content">
            <h3>thông tin liên hệ</h3>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i> 56 trần phú, Q tân bình, tp.hcm</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> hohuy12344@gmail.com</a></li>
                <li><a href="#"><i class="fas fa-phone"></i> 1900 636 099</a></li>
            </ul>
        </div>

        <div class="footer-content">
            <h3>liên kết</h3>
            <ul>
                <li><a href="index.php">trang chủ</a></li>
                <li><a href="products.php">sản phẩm</a></li>
                <li><a href="topbrands.php">thương hiệu</a></li>
                <li><a href="contact.php">giới thiệu</a></li>
            </ul>
        </div>

        <div class="info">
            <form action="">
                <input type="email" placeholder="send email">
                <button class="btn-info">
                    <i class="ri-send-plane-line button__icon"></i>
                    Send
                </button>
            </form>
            <div class="links">
                <a href="https://www.facebook.com/hohuy279/">
                    <i class="ri-facebook-fill"></i>
                </a>
                <a href="https://www.instagram.com/_ninehah_/">
                    <i class="ri-instagram-line"></i>
                </a>
                <a href="https://twitter.com/">
                    <i class="ri-twitter-line"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- <div class="footer">
    <div class="wrapper">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>Information</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#"><span>Advanced Search</span></a></li>
                    <li><a href="#">Orders and Returns</a></li>
                    <li><a href="#"><span>Contact Us</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Why buy from us</h4>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="faq.php">Customer Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="contact.php"><span>Site Map</span></a></li>
                    <li><a href="preview.php"><span>Search Terms</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>My account</h4>
                <ul>
                    <li><a href="contact.php">Sign In</a></li>
                    <li><a href="index.php">View Cart</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="faq.php">Help</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Contact</h4>
                <ul>
                    <li><span>+88-01713458599</span></li>
                    <li><span>+88-01813458552</span></li>
                </ul>
                <div class="social-icons">
                    <h4>Follow Us</h4>
                    <ul>
                        <li class="facebook"><a href="#" target="_blank"> </a></li>
                        <li class="twitter"><a href="#" target="_blank"> </a></li>
                        <li class="googleplus"><a href="#" target="_blank"> </a></li>
                        <li class="contact"><a href="#" target="_blank"> </a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy_right">
            <p>Training with live project &amp; All rights Reseverd </p>
        </div>
    </div>
</div> -->
<script type="text/javascript">
$(document).ready(function() {
    /*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/

    $().UItoTop({
        easingType: 'easeOutQuart'
    });

});
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(function() {
    SyntaxHighlighter.all();
});
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider) {
            $('body').removeClass('loading');
        }
    });
});
</script>
</body>

</html>