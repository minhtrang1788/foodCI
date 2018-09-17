<!-- ****** Blog Sidebar ****** -->
<div class="col-12 col-sm-8 col-md-6 col-lg-4">
	<div class="blog-sidebar mt-5 mt-lg-0">


		<!-- Single Widget Area -->
		<div class="single-widget-area subscribe_widget text-center">
			<div class="widget-title">
				<h6>Subscribe &amp; Follow</h6>
			</div>
			<div class="subscribe-link">
				<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
			</div>
		</div>

		<!-- Single Widget Area -->
		<div class="single-widget-area popular-post-widget">
			<div class="widget-title text-center">
				<h6>New Post</h6>
			</div>
			<?php if($favPosts){
				foreach($favPosts as $fp){?>
					<!-- Single Popular Post -->
					<div class="single-populer-post d-flex">
						<img src="<?php echo base_url()?>/style/img/blog-img/<?php echo $fp->image_hash;?>" alt="">
						<div class="post-content">
							<a href="<?php echo base_url().'index.php/food/viewPost/'.$fp->id; ?>">
								<h6><?php echo $fp->title;?></h6>
							</a>
							<p><?php echo $fp->time_write;?></p>
						</div>
					</div>
				<?php }
			 }?>



		<!-- Single Widget Area -->
		<div class="single-widget-area add-widget text-center">
			<div class="add-widget-area">
				<img src="<?php echo base_url()?>/style/img/sidebar-img/6.jpg" alt="">
				<div class="add-text">
					<div class="yummy-table">
						<div class="yummy-table-cell">
							<h2>Cooking Book</h2>
							<p>Buy Book Online Now!</p>
							<a href="#" class="add-btn">Buy Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Single Widget Area -->
		<div class="single-widget-area newsletter-widget">
			<div class="widget-title text-center">
				<h6>Newsletter</h6>
			</div>
			<p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
			<div class="newsletter-form">
				<form action="#" method="post">
					<input type="email" name="newsletter-email" id="email" placeholder="Your email">
					<button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
				</form>
			</div>
		</div>
	</div>
</div>
