<style type="text/css">
	body {
		background: #c6cdd0;
	}
	.layout-text{
		margin-bottom: 15px;
	}
	.btn-login{
		background: #5a5a5a;
		color: #fff;
	}
</style>

<div class="page-login">
	<form action="" method="post" name="login_form">
		<div class="head-login"><label><h3>Login</h3></label></div>
		<hr>
		<div class="clearfix">
			<input type="text" class="layout-text form-control" name="username" id="text" placeholder="username">
		</div>
		<div class="clearfix">
			<input type="password" class="layout-text form-control" name="password" id="password" placeholder="password">
		</div>
		<div class="clearfix layout-btn">
			<input type="submit" class="btn btn-login" name="submit" value="Login" onclick="">
		</div>
	</form>
</div>
<?php 
// session_start();

// Check Login form submitted
if(isset($_POST['submit'])){
	$logins = array('admin' => 'admin');
	// Check and assign submitted Username and Password to neew variable
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	// Check Username and Password existence in define array
	if(isset($logins[$username]) && $logins[$username] == $password){
		// Success : Set session variable and redirect to Protected page
		$_SESSION['UserData']['username'] = $logins[$username];
		header('location:../index.php');
		exit;
	}
	// Unsuccess : Set error msg
	else{
		$msg = '<span style="color:red"> Invalid Login Details';
		echo $msg;
	}
}
?>