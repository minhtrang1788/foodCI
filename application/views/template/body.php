<div class="col-12 col-lg-8">
	<div class="row">
	<?php if($body){?>
		<!-- Single Post -->
		<div class="col-12">
			<div class="single-post wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
				<!-- Post Thumb -->
				<div class="post-thumb">
					<img src="<?php echo base_url()?>/style/img/blog-img/<?php echo $body[0]->image_hash;?>" alt="">
				</div>
				<!-- Post Content -->
				<div class="post-content">
					<div class="post-meta d-flex">
						<div class="post-author-date-area d-flex">
							<!-- Post Author -->
							
							<!-- Post Date -->
							<div class="post-date">
								<a href="#"><?php echo $body[0]->time_write;?></a>
							</div>
						</div>
						<!-- Post Comment & Share Area -->
						<div class="post-comment-share-area d-flex">
							<!-- Post Favourite -->
							<div class="post-favourite">
								<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i><?php echo $body[0]->like;?></a>
							</div>

						</div>
					</div>
					<a href="#">
						<h2 class="post-headline"><?php echo $body[0]->title;?></h2>
					</a>
					<p> <?php echo $body[0]->content;?></p>
				</div>
			</div>
		</div>

		<?php } ?>
		<!-- ******* List Blog Area Start ******* -->
	</div>
</div>
