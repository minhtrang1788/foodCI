<div class="right_col" role="main">
<div class="x_panel">
    <div class="x_title">
    <h2>ALL PAGES USED</h2>
    
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
            <th class="column-title">Title </th>
            <th class="column-title">Status </th>
            <th class="column-title">Created day </th>
            <th class="column-title">Updated day </th>
            <th class="column-title no-link last"><span class="nobr">Action</span>
            </th>
            <th class="bulk-actions" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
            </th>
            </tr>
        </thead>
      
        <tbody>
           <?php if($body):
                foreach ($body as $b): ?>
            <tr class="even pointer">
            <td class="a-center ">
                <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
            </td>
            <td class=" "><?php echo $b->title_vn;?></td>
            <td class=" "><?php echo $b->status;?> </i></td>
            <td class="a-right a-right "><?php echo $b->created_date;?></td>
            <td class="a-right a-right "><?php echo $b->updated_date;?></td>
            <td class=" last"><a href="<?php echo base_url()?>index.php/food_admin/edit_page/<?php echo $b->id;?>">Edit</a>||<a href="<?php echo base_url()?>index.php/food_admin/del_page/<?php echo $b->id;?>" onClick="javascript:return confirmDel();">Delete</a>
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