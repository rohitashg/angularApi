<?php 
require_once('db.php');
if(!empty($_POST)){
	//echo '<pre>';print_r($_POST);die('here');
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$sql = "INSERT INTO users (name,email,subject,about_your_self) 
	VALUES ('$name','$email','$subject','$message')";
	$res = mysqli_query($con,$sql);
	if($res){
		$data['success'] = 'ok';
		$data['msg'] = 'User registered successfully.';
	}else{
		$data['success'] = 'Failed';
		$data['msg'] = 'User is not registered.';
	}
	mysqli_close($con);
	echo json_encode($data);die;
}else{
	echo 'else come here';die;
}