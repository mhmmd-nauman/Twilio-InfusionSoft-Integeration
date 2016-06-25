<form name="myForm" method="post" class="form-horizontal" role="form"  action="<?php echo base_url('index.php/conversation_ctrl/save_setting'); ?>"  enctype="multipart/form-data" >
    <section id="main" class="column">	
    
    <article class="module width_full">
        
        <header>
            <h3>Conversations</h3>
        </header>
        
        <div class="module_content">
        <?php  if (isset($status)) { ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $status;?>
            </div>
           
                <?php
              //  redirect('refresh'); 
                //redirect('login_ctrl/add_question');
        } ?>    
            <div class="form-group">
                <label class="control-label col-sm-3" for="first_reply_name">First Reply: Name Capture</label>
                <div class="col-sm-9">
                    <textarea style="width: 70%;" class="form-control" rows="5" id="first_reply_name" name="first_reply_name"><?php echo $setting->first_reply_name;?></textarea> 
                </div>
              </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="second_reply_email">Second Reply: Email Capture</label>
                <div class="col-sm-9">
                    <textarea style="width: 70%;" class="form-control" rows="5" id="second_reply_email" name="second_reply_email"><?php echo $setting->second_reply_email;?></textarea> 
                </div>
                
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="third_reply_thanks">Third Reply: Thank You</label>
                <div class="col-sm-9">
                    <textarea style="width: 70%;" class="form-control" rows="5" name="third_reply_thanks" id="third_reply_thanks"><?php echo $setting->third_reply_thanks;?></textarea> 
                </div>
                
            </div>
            
        </div>
       
        <footer>
            <div class="submit_link">
                <input type="submit" name="submit" value="Submit" class="alt_btn">
            </div>
        </footer>
    
    </article>
    <div class="spacer"></div>
    </section>
</form>