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
			<input type="button" class="btn-login" name="Login" value="Login" onclick="_Login()">
		</div>
		</form>
</div>

<script type="text/javascript">
function Login_(){
	var username = $("#username").val();
	var password = $("#password").val();

	console.log(username);
	console.log(password);
	oo();
	$.ajax({
		url:'../http/service.php?action=login',
		type: post,
		data: {
				username:username,
				password:password
		},
		success: function(msg){
			if(msg=="Success"){
				window.location.reload();
			}else if(msg=="USER_NOT_FOUND" || msg=="WRONG_PASSWORD"){
				$(".detail-error").html("ชื่อผู้ใช้งานหรือรหัสผ่านผิดพลาด");
			}else if(msg=="NOT_CONFIRMED"){
				alert('NOT_CONFIRMED');
				// $(".detail-error").html("ชื่อผู้ใช้งานนี้ยังไม่ได้ยืนยัน กรุณายืนยันตัวตนใน email ที่ลงทะเบียน  <div onclick='ReSendActivate()'> [ส่งอีเมล์การยืนยันไปที่อีเมล์อีกครั้ง]</div>");
			}else{
				alert("เกิดปัญหาในการใช้งาน กรุณาแจ้งผู้ดูแลระบบ");
			}
		}
		,
	});
}
</script>