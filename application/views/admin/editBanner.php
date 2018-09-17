<div class="right_col" role="main">
<div class="x_panel">
    <div class="x_title">
    <h2>EDIT BANNER</h2>
    <?php if($body):
        print_r($body);
        $b = $body[0];
        ?>
    <div class="clearfix"></div>
    </div>
        <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" >

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="title" value="<?php echo $b->title;?>"  data-validate-length-range="6" data-validate-words="2" required="required">
                </div>
            </div>
            
            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select status</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="status"  data-validate-length-range="6" data-validate-words="2" required="required">
                <option value="0" <?php if($b->status == 0) echo 'selected = "true"';?>>0 : UnActived</option>
                <option value="1" <?php if($b->status == 1) echo 'selected = "true"';?>>1 : Actived</option>
                </select>
            </div>
            </div>

            
            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content</label>
            <div class="btn-group">
                <img name="image_old" src="<?php echo base_url().'style/img/banner-img/'.$b->image;?>" width="100" height="100"/>
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" name="image" id="image_hash"  data-validate-length-range="6" data-validate-words="2" required="required">
            </div>
            </div>   
            
            <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" name="edit">Edit Banner</button>
            </div>
            </div>

        </form>
    </div>
    <?php endif?>
</div>
</div>