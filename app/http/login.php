<style type="text/css">
	.btn-login{
		border: 1px solid #000000;
	}
</style>
<div class="page-login">
	<form>
	<div class="head-login"><label><h3>Login</h3></label></div>
	<hr>
	<div class="clearfix">
		<input type="text" class="login-txtbox" name="username" id="text">
	</div>
	<div class="clearfix">
		<input type="password" class="login-txtbox" name="pwd" id="password">
	</div>
	<div class="clearfix layout-btn">
		<div class="btn btn-login" id="btn-login" name="Login" onclick="Login()">Login</div>
	</div>
	</form>
</div>

<script type="text/javascript">
function Login(){
	alert('55');
}
</script>