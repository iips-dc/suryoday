<!-- Including files for DB connection and Session Control -->
<?php
    require 'core.inc.php';
    require 'connect.inc.php';
?>
<!-- /End of includes -->
<html>
<head>
    <meta charset="utf-8">
    <title>Tutorial: Hello Dojo!</title>
    
    <!-- Configuration for the absoulte path -->
     <?php include "../config_global.php";   ?>
    <!-- Core Css -->
    <?php include "../includes/cssLinks.inc.php";   ?>

    <style>
    body{
        background-color: #73008F;
        color:white;
    }
    .text-center{
        text-align: center;
    }
</style>
</head>
<body>

<?php 
    if(loggedIn()){ #This function is in /includes/login/core.inc.pho for verfying user session
?>
    <div class="container">
        <h2  style="text-align:center">Welcome To Suryoday Trust</h2><br><br>

        <h3>Services</h3><hr>

        <div class="row ">
            <div class="col-md-3 text-center">
                <a href="human_resource/index.php"><img class="img-responsive" src="assets/images/hr.jpg"></a>
            </div>
            <div class="col-md-3">
                <a href="public_relations"><img class="img-responsive" src="assets/images/pr.jpg"></a>
            </div>
            <div class="col-md-3">
                <a href="#"><img class="img-responsive" src="assets/images/baithak.jpg"></a>
            </div>
            <div class="col-md-3">
                <a href="todo"><img class="img-responsive" src="assets/images/todo.png"></a>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br>
        <div class="row ">
            <div class="col-md-3 text-center">
                <a href="#"><img class="img-responsive" src="assets/images/projects.jpg"></a>
            </div>
            <div class="col-md-3">
                <a href="#">Blah-Blah</a>
            </div>
            <div class="col-md-3">
                <a href="#">Blah-Blah</a>
            </div>
            <div class="col-md-3">
                <a href="#">Blah-Blah</a>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->

        <?php include("../_inc/jsLinks.inc.php"); ?>
        <script>
            dojo.require("dijit.dijit"); //for using dojo's layout system
            dojo.require("dijit.form.Button");
        </script>
        
    <?php
        } #End of LoggedIn function
        else{
            include 'includes/login/login_form.inc.php' ;
        }
    ?>

</body>
</html>