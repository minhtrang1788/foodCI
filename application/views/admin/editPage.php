<div class="right_col" role="main">
<div class="x_panel">
    <?php 
     if(isset($body) || $dataGet):?>
    <div class="x_title">
    <h2>EDIT PAGES</h2>
    
    <div class="clearfix"></div>
   
    </div>
        <div class="x_content">
        <div class="error"><?php echo validation_errors();?>AAAAAAAAAAa</div>
        <br>
        <form class="form-horizontal form-label-left" method="post">

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">*Title</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="title" value="<?php if($dataGet) echo $dataGet['title_vn'];else echo $body[0]->title_vn;?>">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">*Description</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="desc" value="<?php if($dataGet) echo $dataGet['description_vn'];else echo $body[0]->description_vn;?>">
                </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">*Select status</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="status">
                <option ></option>
                <option value="0" <?php if(isset($body)) if ($body[0]->status == 0) echo 'selected="true"'; if($dataGet['status'] == 0) echo 'selected="true"';?>>0 : Unpublic</option>
                <option value="1" <?php if(isset($body)) if($body[0]->status == 1) echo 'selected="true"'; if($dataGet['status'] == 1) echo 'selected="true"';?>>1 : Public</option>
                </select>
            </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">*Content</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea style="width: 80%" name="content">
                    <?php if($dataGet) echo $dataGet['content_vn'];else echo $body[0]->content_vn;?>
                </textarea>
            </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Seo keyword</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="seo" value="<?php if($dataGet) echo $dataGet['seo'];else echo $body[0]->seo;?>">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">*slug</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="slug" value="<?php if($dataGet) echo $dataGet['slug'];else  echo $body[0]->slug;?>" >
                </div>
            </div>
            <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" name="edit">Edit Page</button>
            </div>
            </div>

        </form>
    </div>
    <?php endif?>
</div>
</div>