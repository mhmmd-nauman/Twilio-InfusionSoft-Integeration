<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Admin Panel</title>	
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo base_url('js/jquery-1.5.2.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('js/hideshow.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('js/jquery.tablesorter.min.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jquery.equalHeight.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/layout.css'); ?>" type="text/css" media="screen" />
    <link href="<?php echo base_url('css/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <script type="text/javascript">
    $(document).ready(function() 
    { 
      $(".tablesorter").tablesorter(); 
     } 
    );
    $(document).ready(function() {

    //When page loads...
    $(".tab_content").hide(); //Hide all content
    $("ul.tabs li:first").addClass("active").show(); //Activate first tab
    $(".tab_content:first").show(); //Show first tab content

    //On Click Event
    $("ul.tabs li").click(function() {

            $("ul.tabs li").removeClass("active"); //Remove any "active" class
            $(this).addClass("active"); //Add "active" class to selected tab
            $(".tab_content").hide(); //Hide all tab content

            var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
            $(activeTab).fadeIn(); //Fade in the active ID content
            return false;
    });
});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
</head>
<body>
<header id="header">
    <hgroup>
        <h1 class="site_title"></h1>
        <h2 class="section_title">SMS To Infusionsoft Conversation App</h2></div>
    </hgroup>
</header> <!-- end of header bar -->
<section id="secondary_bar">
    <div class="user">
        <p>Admin</p>
         <a class="logout_user" href="<?php echo base_url()."index.php/login_ctrl/logout"; ?>" title="Logout">Logout</a> 
    </div>
<div class="breadcrumbs_container">
    <!--
    <article class="breadcrumbs"><a href="dashboard.php" class="current">Dashboard</a> 
         <div class="breadcrumb_divider"></div> <a href="change_password.php" class="current" >Change Password</a>
    </article>
    -->
</div>  
</section><!-- end of secondary bar -->
<aside id="sidebar" class="column">
<h3>Configurations</h3>
<ul >
    <li class="icn_new_article"><a href="<?php echo base_url()."index.php/dashboard/"; ?>">Dashboard</a></li>
    
</ul>
<ul >
    <li class="icn_new_article"><a href="<?php echo base_url()."index.php/setting_ctrl/"; ?>">App Keys & Number</a></li>
    
</ul>
<ul >
    <li class="icn_new_article"><a href="<?php echo base_url()."index.php/conversation_ctrl/"; ?>">Conversation Settings</a></li>
    
</ul>
<ul >
    <li class="icn_new_article"><a href="<?php echo base_url()."index.php/contact_ctrl/"; ?>">Contacts</a></li>
    
</ul>
<footer>
    <hr />
    <p><strong>Copyright &copy; <?php echo date("Y");?></strong></p>
</footer>
</aside>
    