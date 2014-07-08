<html>
<head>
    <meta charset="utf-8">
    <title>Suryoday Trust | Home</title>

    <!-- Links CSS files -->
    <link rel="stylesheet" type="text/css" href="assests/js/dojo-1.9.3/dijit/themes/claro/claro.css">
    <link rel="stylesheet" type="text/css" href="assests/css/bootstrap/bootstrap-responsive.css">
    <style>
        body{
            background-color: #6AC15D;

        }
    </style>
</head>
<body class="claro">
    <div class="container">
    	<!-- Header & Logo section -->
    	<div class="row">
    		<div class="col-md-4"></div>
    		<div class="col-md-8"></div>
    	</div>
        <h2 style="text-align:center">Please Login To Manage Suryodoay Trust</h2>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form action="app/index.php" name="loginForm" method="post">
                    <label>Username </label>
                    <input type="textbox" name="username" /><br><br>
                    <label>Password </label>
                    <input type="textbox" name="password" /><br>    
                    <button type="submit" id="loginButton" dojoType="dijit.form.Button">Login</button>
                </form>

                New User?
                <button id="registration" dojoType="dijit.form.Button">Register</button>
                <div dojoType="dijit.layout.ContentPane" id="registrationPane"></div>

            </div>

            <div class="col-md-4">
            </div>

        </div>
        <!-- .row -->
    </div>
    <!-- .container -->

    <!-- Javascript links -->
    <script src="lib/dojo-1.9.3/dojo/dojo.js" djConfig="parseOnLoad: true"></script>
    <script>
        dojo.require("dijit.dijit"); //for using dojo's layout system
        dojo.require("dijit.form.Button");
        dojo.require("dijit.layout.ContentPane");

        //Binding click event to link to load html file
        dojo.addOnLoad(function(){
            var register = dijit.byId("registration");
            var regPane = dijit.byId("registrationPane");

            dojo.connect(register, "onClick", null, function(evt){
                regPane.attr("href", "app/_inc/registration.inc.html");
            })
        });
    </script>
</body>
</html>