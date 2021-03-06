<body id="login">
<div class="page-login">
	<form action="" method="post" name="login_form">
		<div class="head-login"><label><h3>Log in</h3></label></div>
		<hr>
		<div class="clearfix layout-login input-group">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
			<input type="text" class="form-control" name="username" id="username" placeholder="username">
		</div>
		<div class="clearfix layout-login input-group">
			<span class="input-group-addon"><i class="fa fa-key"></i></span>
			<input type="password" class="form-control" name="password" id="password" placeholder="password">
		</div>
		<div class="clearfix layout-btn">
			<input type="submit" class="btn btn-login" name="submit" value="Login" onclick="">
		</div>
	</form>
</div>
</body>

<?php
// Check Login form submitted
if (isset($_POST['submit'])) {
    $logins = array('admin' => 'admin');
    // Check and assign submitted Username and Password to neew variable
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    // Check Username and Password existence in define array
    if (isset($logins[$username]) && $logins[$username] == $password) {
        // Success : Set session variable and redirect to Protected page
        $_SESSION['UserData']['username'] = $logins[$username];
        header('location:../index.php');
        exit;
    }
    // Unsuccess : Set error msg
    else {
        $msg = '<span style="color:red"> Invalid Login Details';
        echo $msg;
    }
}
?>
<script type="text/javascript">
	window.onload = function(){
		document.getElementById('username').focus();
	}
</script>