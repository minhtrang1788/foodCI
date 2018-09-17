<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Gentelella Alela! | <?php if($dataGet['content_vn']) echo $dataGet['content_vn']; else $dataGet['content_vn'] ='mmm';?> </title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
    
	<script type="text/javascript">
		$(document).ready(function() {
			$('#posts-table').DataTable({
				processing: true,
           		serverSide: true,
				"pageLength" : 5,
				"ajax": {
					url : "<?php echo site_url("food_admin/data_all_posts") ?>",
					type : 'GET'
				},
			});
		});
	</script>
	<style>
	.error {
		padding-left: 300px;
		color:red;
	}
	</style>
	<!-- Bootstrap -->
	<link href="<?php echo base_url()?>style_admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url()?>style_admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?php echo base_url()?>style_admin/vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="<?php echo base_url()?>style_admin/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

	<!-- Custom styling plus plugins -->
	<link href="<?php echo base_url()?>style_admin/build/css/custom.min.css" rel="stylesheet">
	<?php if($action != "createPost" && $action != "editPost" && $action != "createPage" ):?>
	<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo base_url();?>/style_admin/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
	<?php endif ?>
	<script>
		function confirmDel(){
		if (!confirm("Are you sure you want to delete?")) return false;
		return true;
		}
		function noPermissionAdmin(){
			alert("You do not have this permission!. Thanks"); return false;
		}

	</script>
    
</head>

<body class="nav-md" onload="getContent()">
<div class="container body">
	<div class="main_container">
		<div class="col-md-3 left_col">
			<div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0;">
					<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin page!</span></a>
				</div>

				<div class="clearfix"></div>

				<!-- menu profile quick info -->
				<div class="profile clearfix">
					<?php
						$un = $model->getAccUsername($_SESSION['username']);
						$img = $un[0]->image;
						
					?>
					<div class="profile_pic">
						<img src="<?php echo base_url()?>style/img/blog-avt/<?php echo $img;?>" alt="..." class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Welcome,</span>
						<h2><?php echo $_SESSION['username'];?></h2>
					</div>
				</div>
				<!-- /menu profile quick info -->

				<br />
				
				<!-- sidebar menu -->
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
					<div class="menu_section">
						<h3>General</h3>
						<ul class="nav side-menu">
						<?php if($nav):
							foreach($nav as $n):
							?>
							<li><a><i class="fa <?php echo $n->image;?>"></i> <?php echo $n->name;?> <span class="fa fa-chevron-down"></span></a>
								
								<ul class="nav child_menu">
								<?php 
								 $navs_child = $model->getNav($n->id);
								foreach($navs_child as $c):	
								?>
									<li><a href="<?php echo base_url();?>index.php/food_admin/<?php echo $c->link;?>"><?php echo $c->name;?></a></li>
									<?php endforeach;?>
									
								</ul>
								
							</li>
							<?php endforeach;
							endif
						?>	
						</ul>
					</div>
				</div>
				<!-- /sidebar menu -->

			</div>
		</div>