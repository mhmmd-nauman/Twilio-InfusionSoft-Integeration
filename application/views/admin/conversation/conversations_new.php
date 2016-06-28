<form name="myForm" method="post" class="form-horizontal" role="form"  action="<?php echo base_url('index.php/conversation_ctrl/save_setting'); ?>"  enctype="multipart/form-data" >
    <section id="main" class="column">	
    
    <article class="module width_full">
        
        <header>
            <h3>Add New Conversation</h3>
        </header>
        
        <div class="module_content">
           <div class="form-group">
                <label class="control-label col-sm-3" for="name">Conversation Name:</label>
                <div class="col-sm-9">
                    <input type="text" style="width: 70%;" class="form-control"  id="name" name="name"/>
                </div>
              </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="first_reply_name">First Reply: Name Capture</label>
                <div class="col-sm-9">
                    <textarea style="width: 70%;" class="form-control" rows="3" id="first_reply_name" name="first_reply_name"></textarea> 
                </div>
              </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="second_reply_email">Second Reply: Email Capture</label>
                <div class="col-sm-9">
                    <textarea style="width: 70%;" class="form-control" rows="3" id="second_reply_email" name="second_reply_email"></textarea> 
                </div>
                
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="third_reply_thanks">Third Reply: Thank You</label>
                <div class="col-sm-9">
                    <textarea style="width: 70%;" class="form-control" rows="3" name="third_reply_thanks" id="third_reply_thanks"></textarea> 
                </div>
                
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="name">KeyWord:</label>
                <div class="col-sm-9">
                    <input type="text" style="width: 70%;" class="form-control"  id="keyword" name="keyword"/>
                </div>
              </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Tag:</label>
                <div class="col-sm-9">
                    <input type="text" style="width: 70%;" class="form-control"  id="Apply_Tag" name="Apply_Tag"/>
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