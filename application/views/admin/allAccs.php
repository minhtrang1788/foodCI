<div class="right_col" role="main">
<div class="x_panel">
    <div class="x_title">
    <h2>ALL ACCOUNT USED</h2>
    <?php 
        $us = $model->getIdAccount($_SESSION['username']);
        
    ?>
    <div class="clearfix"></div>
    </div>
    
    <div class="x_content">
    
    <dx`iv class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
        <thead>
            <tr class="headings">
            <th>
                <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
            </th>
            <th class="column-title">ID </th>
            <th class="column-title">Username </th>
            <th class="column-title">Password </th>
            <th class="column-title">Email </th>
            <th class="column-title">Role </th>
            <th class="column-title no-link last"><span class="nobr">Action</span>
            </th>
            <th class="bulk-actions" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
            </th>
            </tr>
        </thead>
      
        <tbody>
           <?php if($body):
                $i = 0;
                foreach ($body as $b):
                $i++;
                ?>
            <tr class="even pointer">
            <td class="a-center ">
                <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
            </td>
            <td class=" "><?php echo $i;?></td>
            <td class=" "><?php echo $b->username;?> </i></td>
            <td class="a-right a-right "><?php echo $b->password;?></td>
            <td class="a-right a-right "><?php echo $b->email;?></td>
            <td class="a-right a-right "><?php echo $b->role;?></td>
          
            <td class=" last" ><a  href="<?php echo base_url()?>index.php/food_admin/edit_Acc/<?php echo $b->id;?>" <?php if($us[0]->role == 1) echo 'onClick="javascript: return noPermissionAdmin();"';?>>Edit</a>||
            <a href="<?php echo base_url()?>index.php/food_admin/del_Acc/<?php echo $b->id;?>" <?php if( $us[0]->role == 0) echo 'onClick="javascript: return confirmDel()"'; else echo 'onClick="javascript: return noPermissionAdmin();"';?>>Delete</a>
            </td>
           
            </tr>
           <?php endforeach;
                endif
           ?>
           
        </tbody>
        </table>
    </div>
            
        
    </div>
</div>
</div>