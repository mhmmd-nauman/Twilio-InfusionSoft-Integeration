<section id="main" class="column">	
    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Contact List</h3>
        </header>
    <div class="tab_container">
        <div id="tab1" class="tab_content" style="display: block;">
        <table class="tablesorter" cellspacing="0"> 
        <thead> 
            <tr> 
                <th class="header">#</th> 
                <th class="header">First Name</th>
                <th class="header">Email</th>
                <th class="header">Phone</th>
                <th class="header">Tag</th>
                <th class="header">Actions</th> 
            </tr> 
        </thead> 
        <tbody> 
        <?php foreach($list as $data)     {  ?>
            <tr> 
                <td><?php echo $data->id; ?></td> 
                <td><?php echo $data->first_name; ?></td>
                <td><?php echo $data->email; ?></td>
                <td><?php echo $data->phone; ?></td>
                <td><?php echo $data->tag; ?></td>
                <td>
                    <!--<input type="image" src="<?php echo base_url('images/icn_edit.png'); ?>" title="Edit">-->
                    <a href="<?php echo base_url('index.php/contact_ctrl/del_contact/'.$data->id); ?>"><input  type="image" src="<?php echo base_url('images/icn_trash.png'); ?>" title="Trash"></a>
                </td> 
            </tr> 
        <?php } ?>
        </tbody> 
        </table>
        </div><!-- end of #tab1 -->
    </div><!-- end of .tab_container -->
    </article>
</section>