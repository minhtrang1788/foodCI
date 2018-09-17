<div class="col-12 col-lg-8">
	<?php if($content):
		?>
	<!-- Single Widget Area -->
	<div class="single-widget-area about-me-widget text-center">
		<div class="widget-title">
			<h6><?php echo $content[0]->title_vn; ?></h6>
		</div>
		<div class="about-me-widget-thumb">
			<?php echo $content[0]->content_vn; ?>
		</div>
	</div>
	<?php endif?>
</div>
