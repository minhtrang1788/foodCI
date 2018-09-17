<div class="right_col" role="main">
<div class="x_panel">
    <div class="x_title">
    <h2>CREATE NEW BANNER</h2>
    
    <div class="clearfix"></div>
    </div>
        <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" >

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="title"  data-validate-length-range="6" data-validate-words="2" required="required">
                </div>
            </div>
            
            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select status</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="status"  data-validate-length-range="6" data-validate-words="2" required="required">
                <option value="0">0 : UnActived</option>
                <option value="1">1 : Actived</option>
                </select>
            </div>
            </div>

            
            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content</label>
            <div class="btn-group">
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" name="image" id="image_hash"  data-validate-length-range="6" data-validate-words="2" required="required">
            </div>
            </div>   
            
            <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" name="create">Create Banner</button>
            </div>
            </div>

        </form>
    </div>
</div>
</div>