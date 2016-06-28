<section id="main" class="column">	
    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Conversation List</h3>
        </header>
    <div class="tab_container">
        <div id="tab1" class="tab_content" style="display: block;">
            <?php  if (isset($status)) { ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $status;?>
            </div>
           
                <?php
              
                } ?> 
            <?php  if (isset($error)) { ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> <?php echo $error;?>
            </div>
           
                <?php
              
                } ?>
            <div class="row">
                <div class="col-md-8">
                    &nbsp;
                </div>
                <div class="col-md-2 pull-right" >
                    <a class="btn  btn-success btn-sm " href="<?php echo base_url('index.php/conversation_ctrl/add_new'); ?>">Add New Conversation</a>
                </div>
            </div>
            <div class="row">
                &nbsp;
            </div>
        <table class="tablesorter table-hover table" cellspacing="0"> 
        <thead> 
            <tr> 
                <th class="header" style="width: 10%;">#</th> 
                <th class="header" style="width: 50%;">Name</th>
                <th class="header">KeyWord</th>
                <th class="header">Tag</th>
                <th class="header" style="width: 10%;">Actions</th> 
            </tr> 
        </thead> 
        <tbody> 
        <?php foreach($list as $data)     {  ?>
            <tr> 
                <td><?php echo $data->id; ?></td> 
                <td><?php echo $data->name; ?></td>
                <td><?php echo $data->keyword; ?></td>
                <td><?php echo $data->Apply_Tag; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/conversation_ctrl/load_con/'.$data->id); ?>"><input type="image" src="<?php echo base_url('images/icn_edit.png'); ?>" title="Edit"></a>
                    <a href="<?php echo base_url('index.php/conversation_ctrl/del_conversation/'.$data->id); ?>" onclick="return confirmation();"><input  type="image" src="<?php echo base_url('images/icn_trash.png'); ?>" title="Trash"></a>
                </td> 
            </tr> 
        <?php } ?>
        </tbody> 
        </table>
        </div><!-- end of #tab1 -->
    </div><!-- end of .tab_container -->
    </article>
</section>
<script>
    function confirmation() {
        var answer = confirm("Do you want to delete this record?");
    if(answer){
            return true;
    }else{
            return false;
    }
}
</script>