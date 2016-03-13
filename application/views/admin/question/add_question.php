<form name="myForm" method="post" class="register" action="<?php echo base_url('index.php/question_ctrl/add_question'); ?>"  enctype="multipart/form-data" >
    <section id="main" class="column">	
    
    <article class="module width_full">
        
        <header>
            <h3>Subject</h3>
        </header>
        
        <div class="module_content">
        <?php  if (isset($status)) { ?>
            <h4 class="alert-success"><strong><?php echo $status;?></strong> </h4>
                <?php
              //  redirect('refresh'); 
                //redirect('login_ctrl/add_question');
        } ?>    <div class="clear"></div>
            <fieldset>
                <label>Question</label><input type="text" name="question"  style=" width: 50%" placeholder="Put your Question here..." required=""   />
            <br><br>
                    <label>Option 1:</label><input type="text" name="option1"  style=" width: 20%" placeholder="Option 1" required="" />
            <br><br>
                <label>Option 2:</label><input type="text" name="option2"  style=" width: 20%"  placeholder="Option 2" required="" />
            <br><br>
                    <label>Option 3:</label><input type="text" name="option3"  style=" width: 20%"  placeholder="Option 3" required="" />
            <br><br>
                    <label>Option 4:</label><input type="text" name="option4"  style=" width: 20%"  placeholder="Option 4" required="" />
            <br><br>
                    <label>Answer:</label>
                    <select name="answer" style=" width: 10%">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
            </fieldset>
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