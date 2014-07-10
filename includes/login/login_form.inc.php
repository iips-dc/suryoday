<?php
	if(isset($_POST['username']) and isset($_POST['password'])){
		echo $_POST['username'];
		echo $_POST['password'];
		$userName = $_POST['username'];
		$password = $_POST['password'];
		if(!empty($userName) and !empty($password)){
			echo "adkdkhf";
			$result = mysqli_query($con,"Select * from user_login where user_name ='".$userName."' and password = '".$password."'") or die(mysqli_error($con));
			$row = mysqli_fetch_array($result);
			if($row['user_name']==$userName and $row['password']==$password){
				$_SESSION['username'] = $userName;
				header('location:'.$currentFile);
			}
			else{
				echo "Invalid Username/Password Combination";
			}
			mysqli_close($con);
		}
	}
?>

	<h2 style="text-align:center">Please Login To Manage Suryodoay Trust</h2>
	<form class="container" action="<?php echo $currentFile; ?>" method="post" id="loginForm">
		<!-- <fieldset style = "border: 3px solid skyblue; padding : 20px 10px 20px 10px;">
			<div >
			
				<label> Username </label>
				<input type = "text" class="form-control" name="userName" placeholder= "Enter Your Username or Email"> 
				<br>
				<label>Password</label>
				<input type="password"  class="form-control" name="passWord" placeholder = "Enter Your Password">
				<br>

				<button class="btn btn-primary" type="submit"> Login</button>
				<a style ="padding-top:10px;" class="pull-right" href="">Forgot the password</a>

			</div>
		</fieldset> -->

        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4"><br>
                <form action="<?php echo $currentFile; ?>" name="loginForm" method="post">
                    <label>Username </label>
                    <input type="textbox" name="username" /><br><br>
                    <label>Password </label>
                    <input type="password" name="password" /><br> <br> 
                    <button type="submit" id="loginButton" dojoType="dijit.form.Button">Login</button>
                </form>

            </div>

            <div class="col-md-4">
            </div>

        </div>
        <!-- .row -->
	</form>