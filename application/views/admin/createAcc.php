<div class="right_col" role="main">
<div class="x_panel">
    <div class="x_title">
    <h2>UPDATE INFORMATION ACCOUNT</h2>
    
    <div class="clearfix"></div>
    </div>
    <div class="error">
        <?php echo validation_errors(); ?>
    </div>
        <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" method="post"  enctype="multipart/form-data">
             
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="username" value="<?php if($dataGet)echo $dataGet['username'];?>">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="password" class="form-control" placeholder="Default Input" name="password" value="<?php if($dataGet)echo $dataGet['password'];?>">
                </div>
            </div>

           <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">RePassword</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="password" class="form-control" placeholder="Default Input" name="repassword" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="Default Input" name="email" value="<?php if($dataGet)echo $dataGet['email'];?>">
                </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
            <div class="btn-group">
                <a class="btn" title="Insert picture (or just drag &amp; drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" name="image" id="image">
            </div>
            </div> 
            
            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="role">
                <option ></option>
                <option value="0"  <?php if($dataGet['role'] == 0) echo 'selected="selected"';?> >0 : Admin</option>
                <option value="1" <?php if($dataGet['role'] == 1) echo 'selected="selected"';?> >1 : Mode</option>
                </select>
            </div>
            </div>

            
            <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" name="create">Create Account</button>
            </div>
            </div>
            
        </form>
    </div>
</div>
</div>