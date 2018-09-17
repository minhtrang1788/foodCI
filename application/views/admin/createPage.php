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
<div class="right_col" role="main">
<div class="x_panel">
    <div class="x_title">
    <h2>ALL PAGES USED</h2>
    
    <div class="clearfix"></div>
    </div>
        <div class="x_content">
        <br>
         <div class="error"><?php  echo validation_errors(); ?></div>
       
        <form class="form-horizontal form-label-left" method="post">
           
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">*Title</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="title" value="<?php if($dataGet) echo $dataGet['title_vn'];?>">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">*Description</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="desc" value="<?php if($dataGet) echo $dataGet['description_vn'];?>">
                </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">*Select status</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="status" value=" " >
                <option ></option>
                <option value="0" selected=" <?php if($dataGet['status'] == 0) echo 'selected';?>">0 : Unpublic</option>
                <option value="1" selected=" <?php if($dataGet['status'] == 1) echo 'selected';?>">1 : Public</option>
                </select>
            </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">*Select status</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
            <textarea id="textarea_id" name="content" rows="15" cols="80" style="width: 80%">
                <?php if($dataGet) echo $dataGet['content_vn'];?>
                </textarea>
            </div>
            </div>   
              
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Seo keyword</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="seo">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">*slug</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="slug"  value="<?php if($dataGet) echo $dataGet['slug'];?>">
                </div>
            </div>
            <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" name="create" onclick="doAlert();">Create Page</button>
            </div>
            </div>

            
            
        </form>
    </div>

</div>
</div>