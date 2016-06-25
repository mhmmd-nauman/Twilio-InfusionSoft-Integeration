<link href="<?php echo base_url('css/adminlog.css'); ?>" rel="stylesheet">
<div class="login-page">
    <?php
    if ($this->session->userdata('sess_ci_admin_msg_type') == 'error') {
        ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> <?php echo $this->session->userdata('sess_ci_admin_msg');?>
    </div>
    <?php 
     $this->session->set_userdata(array(
        'sess_ci_admin_msg' => "",
        'sess_ci_admin_msg_type' => ''
    ));
    } ?>
<?php      
$attributes = array('class' => 'login-form', 'method' => 'post','onsubmit'=>'return Validate(this);');
echo form_open('login_ctrl/dologin',$attributes);
?>
    <div class="form">
        <?php echo form_open(base_url()."index.php/login_ctrl/dologin", $attributes);?>          
        <input type="text" placeholder="username" name="username" />
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="submit" value="submit">login</button>
<!--      <p class="message">Not registered? <a href="#">Create an account</a></p>-->
    </form>
  </div>
</div>