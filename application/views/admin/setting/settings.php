<form name="myForm" class="form-horizontal" role="form" method="post"  action="<?php echo base_url('index.php/setting_ctrl/save_setting'); ?>"  enctype="multipart/form-data" >
    <section id="main" class="column">	
    
    <article class="module width_full">
        
        <header>
            <h3>Settings</h3>
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
                <label class="control-label col-sm-3" for="first_reply_name">Twilio Account Sid:</label>
                <div class="col-sm-9">
                    <input style="width: 70%;" class="form-control" type="text" name="ACCOUNT_SID" value="<?php echo $setting->ACCOUNT_SID;?>"   placeholder="Account Sid" required=""   />

                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="first_reply_name">Twilio Auth Token:</label>
                <div class="col-sm-9">
                    <input style="width: 70%;" class="form-control" type="text" name="AUTH_TOKEN" value="<?php echo $setting->AUTH_TOKEN;?>"   placeholder="Auth Token" required=""   />
                    
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="first_reply_name">Infusionsoft App:</label>
                <div class="col-sm-9">
                    <input style="width: 70%;" class="form-control" type="text" name="Infusionsoft_App" value="<?php echo $setting->Infusionsoft_App;?>"   placeholder="Infusionsoft App" required=""   />
                    
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="first_reply_name">Infusionsoft API Key:</label>
                <div class="col-sm-9">
                    <input style="width: 70%;" class="form-control" type="text" name="Infusionsoft_API_Key" value="<?php echo $setting->Infusionsoft_API_Key;?>"   placeholder="Infusionsoft API Key" required=""   />
                    
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="first_reply_name">Twilio Phone Number:</label>
                <div class="col-sm-9">
                    <input style="width: 70%;" class="form-control" type="text" name="Number" value="<?php echo $setting->Number;?>"   placeholder="Twilio Phone Number" required=""   />
                    
                </div>
            </div>       
            <div class="form-group">
                <label class="control-label col-sm-3" for="first_reply_name">Infusionsoft Apply Tag:</label>
                <div class="col-sm-9">
                    <input style="width: 70%;" class="form-control" type="text" name="Apply_Tag" value="<?php echo $setting->Apply_Tag;?>"   placeholder="Infusion Soft Tag" required=""   />
                    
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