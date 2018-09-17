<?php if($listPosts){?>
<div class="col-12 col-lg-8">
	<div class="row">
		<?php
			foreach($listPosts as $p){
			?>
			<div class="col-12 col-md-6">
			<div class="single-post wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
				<!-- Post Thumb -->
				<div class="post-thumb">
					<img src="<?php echo base_url()?>/style/img/blog-img/<?php echo $p->image_hash;?>" alt="">
				</div>
				<!-- Post Content -->
				<div class="post-content">
					<div class="post-meta d-flex">
						<div class="post-author-date-area d-flex">
							
							<!-- Post Date -->
							<div class="post-date">
								<a href="#"><?php echo $p->time_write;?></a>
							</div>
						</div>
						<!-- Post Comment & Share Area -->
						<div class="post-comment-share-area d-flex">
							<!-- Post Favourite 
							<div class="post-favourite">
								<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>
									<?php if($p->like) echo $p->like; else echo'17';?>
								</a>
							</div>
						-->
						</div>
					</div>
					<a href="<?php echo base_url().'index.php/food/viewpost/'.$p->id;?>">
						<h4 class="post-headline"><?php echo $p->title;?></h4>
					</a>
				</div>
			</div>
		</div>
			<?php }

		?>
	</div>
</div>
<?php 	} else echo '<div > No post for this page! Please go to admin and add more. Thanks!</div>';?>
