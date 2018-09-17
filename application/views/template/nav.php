<!-- ****** Header Area Start ****** -->
<header class="header_area">
	<div class="container">
		<div class="row">
			<?php if($banner):?>
			<!-- Logo Area Start -->
			<div class="col-12">
				<div class="logo_area text-center">
					<a href="#" class="yummy-logo"><?php echo $banner->title;?></a>
				</div>
			</div>
			<?php endif?>
		</div>

		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-expand-lg">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
					<!-- Menu Area Start -->
					<div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
						<ul class="navbar-nav" id="yummy-nav">
							<li></li>
							<?php if($cat){

								foreach($cat as $c){
									$sub_cat = $model->getCategory($c->id);
									if(!$sub_cat) echo '<li class="nav-item ">';
									else echo '<li class="nav-item dropdown">';
									if(!($sub_cat)){
											//	print_r($sub_cat);
											?>
											<a class="nav-link" href="<?php echo base_url().'index.php/food/page/'. $c->id;?>"><?php echo $c->title_vn;?> <span class="sr-only">(current)</span></a>
										<?php } else {?>
											<a class="nav-link dropdown-toggle" href="#" id="yummyDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Pages</a>
											<div class="dropdown-menu" aria-labelledby="yummyDropdown">
												<?php foreach ($sub_cat as $sub_c){ ?>
													<a class="dropdown-item" href="<?php echo $sub_c->slug;?>.html"><?php echo $sub_c->title_vn;?></a>
												<?php }?>
											</div>
										<?php } ?>
									</li>
								<?php }
							} ?>

							<?php if($pages){

							foreach($pages as $p){
								?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url().'index.php/food/pageView/'. $p->id;?>"><?php echo $p->title_vn;?> <span class="sr-only">(current)</span></a>
								</li>
							<?php }
							} ?>	

						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
<!-- ****** Header Area End ****** -->
<section class="blog_area section_padding_0_80">
	<div class="container">
		<div class="row justify-content-center">
