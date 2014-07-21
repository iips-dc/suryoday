<!-- Including files for DB connection and Session Control -->
<?php
    require 'includes/login/core.inc.php';
    require 'includes/login/connect.inc.php';
?>
<!-- /End of includes -->
<html>
<head>
    <meta charset="utf-8">
    <title>Suryoday | Home</title>
    
    <!-- Configuration for the absoulte path -->
     <?php include "config_global.php";   ?>
    <!-- Core Css -->
    <?php include "includes/cssLinks.inc.php";   ?>

    <style>
    .text-center{
        text-align: center;
    }
</style>
</head>
<body class="claro">

<!-- Including Header -->

<?php 
    if(loggedIn()){ #This function is in /includes/login/core.inc.pho for verfying user session
?>
    <div>
        <!-- Start of page's Border Layout  -->
        <div dojoType="dijit.layout.BorderContainer" style="width: 100%;height: 100%;"> 
            <div dojoType="dijit.layout.ContentPane" region="top"> 
                <?php include('includes/header.inc.php'); ?>
                <?php include('includes/menu_bar.inc.php'); ?>
            </div> 

            <!-- Center Region of layout -->
             <div dojoType="dijit.layout.ContentPane" id="content" region="center"> 
                 <h3 style="color:#ED440C">Services</h3><hr>
                <div class="row ">
                    <div class="col-md-3 text-center">
                        <a href="app/baithak/index.php"><img class="img-responsive img-rounded" src="assests/img/baithak.jpg"></a>
                    </div>
                    <div class="col-md-3">
                        <a href="app/public_relation/index.php"><img class="img-responsive img-rounded" src="assests/img/pr.jpg"></a>
                    </div>
                    <div class="col-md-3">
                         <a href="app/human_resource/index.php"><img class="img-responsive img-rounded" src="assests/img/hr.jpg"></a>
                    </div>
                    <div class="col-md-3">
                        <a href="todo"><img class="img-responsive img-rounded" src="assests/img/todo.png"></a>
                    </div>
                </div>
                <br><br><br><br><br><br><br><br><br>
                <div class="row ">
                    <div class="col-md-3 text-center">
                        <a href="#"><img class="img-responsive img-rounded" src="assests/img/projects.jpg"></a>
                    </div>
                    <div class="col-md-3">
                        <a href="#"><img class="img-responsive img-rounded" src="assests/img/projects.jpg"></a>
                    </div>
                    <div class="col-md-3">
                        <a href="#"><img class="img-responsive img-rounded" src="assests/img/projects.jpg"></a>
                    </div>
                    <div class="col-md-3">
                        <a href="#"><img class="img-responsive img-rounded" src="assests/img/projects.jpg"></a>
                    </div>
                </div>
                <!-- .row --> 
            </div> 
        
            <!-- Bottom Region of Layout -->
            <div dojoType="dijit.layout.ContentPane" region="bottom" splitter="true"> 
                &copy; Suryoday Trust . <span style="float:right">Powered By <a  href="#">Developement Center</a> <span>
            </div>
        </div>
        <!-- end of Border Layout Container -->
    </div>
    <!-- .container -->

        <?php include("includes/jsLinks.inc.php"); ?>
        <?php include("includes/dojo_widgets.inc.php"); ?>
        
    <?php
        } #End of LoggedIn function
        else{
            include 'includes/login/login_form.inc.php' ;
        }
    ?>
    <script>
        dojo.require("dijit.dijit"); //for using dojo's layout system
        dojo.require("dijit.form.Button");
    </script>

</body>
</html>