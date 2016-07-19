<?php
session_start();

switch ($_GET['action']) {
	
	case 'login': login(trim($_POST['username']),trim($_POST['password']));
		break;
	
	default:
		# code...
		break;
}

// function
function login($username,$password){
	global $con;

	$sql = "SELECT * FROM tbl_user where user_name = '".$username."'";
	$query=mysqli_query($con,$sql);

	if(mysqli_num_rows($query)>0){
		while($row = mysqli_fetch_assoc($query)){
			$db_password = $row['user_password'];

			//Decrypt password
			//require_once('Encryption.php');
			//$encryption = new Encryption($db_password,'de');
			//$db_password = $encryption->endecrypt();

			//Check confirm password
			if($password==$db_password){

					//Set session for using
					require_once("command.php");
					$cmd = new Command();

					if($username=="admin"){
						$cmd->setParam('session','user',$row['user_name']);	
						$cmd->setParam('session','admin',true);	
					}else{
						$cmd->setParam('session','user',$row['user_name']);
						$cmd->setParam('session','user_id',$row['user_id']);
						$cmd->setParam('session','user_group',$row['user_group']);
					}

					print("Success");
					exit;
			}else{
				print("WRONG_PASSWORD");
				exit;
			}
		}
	}else{
		print("USER_NOT_FOUND");
		exit;
	}
}
?>