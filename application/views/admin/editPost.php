<div class="right_col" role="main">
<div class="x_panel">
    <div class="x_title">
    <h2>ALL PAGES USED</h2>
    
    <div class="clearfix"></div>
    </div>
        <div class="x_content">
    
        <div class="error"><?php  echo validation_errors(); ?></div>
        <br>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="title" value="<?php if(isset($dataGet)) echo $dataGet['title'];?>" >
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="desc" value="<?php if(isset($dataGet)) echo $dataGet['des'];?>">
                </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select status</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="status">
                <option ></option>
                <option value="0" <?php if(isset($dataGet) && ($dataGet['status'] == 0)) echo 'selected="true"' ;?>>0 : Unpublic</option>
                <option value="1" <?php if(isset($dataGet) && ($dataGet['status'] == 1)) echo 'selected="true"' ;?>>1 : Public</option>
                </select>
            </div>
            </div>

           

            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="textarea" name="content" class="form-control col-md-7 col-xs-12" >
                <?php if(isset($dataGet)) echo $dataGet['content'];?>
                </textarea>
             </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
            <div class="btn-group">
                <a class="btn" title="Insert picture (or just drag &amp; drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" name="image_hash" id="image_hash">
            </div>
            </div>     

             <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Parent category</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="parent_cat" >
                <option ></option>
                <?php if ($model):
                    $navs = $model->getAllCategory();
                    foreach($navs as $n):
                    ?>
                
                     <option value="<?php echo $n->id;?>" <?php if(isset($dataGet) && ($dataGet['parent_id'] == $n->id)) echo 'selected="selected"'; ?>><?php  echo $n->title_vn;?></option>
                    <?php endforeach;
                        endif;
                    ?>
                </select>
            </div>
            </div>

            <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" name="edit">Edit Post</button>
            </div>
            </div>

        </form>
    </div>
</div>
</div>