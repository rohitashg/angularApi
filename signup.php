<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
error_reporting(E_ALL);
require_once('db.php');
$request_body = file_get_contents('php://input');
if(!empty($request_body) && $request_body !=''){
	//echo '<pre>';print_r($request_body);die;
	$data = json_decode($request_body);
	$name = $data->name;
	$email = $data->email;
	$subject = $data->subject;
	$message = $data->message;
	$sql = "INSERT INTO users (name,email,subject,about_your_self) VALUES ('$name','$email','$subject','$message')";
	$res = mysqli_query($con,$sql);

	if($res==1){
		$data['success'] = 'ok';
		$data['msg'] = 'User registered successfully.';
		echo '<pre>';print_r($data);die;
	}else{
		$data['success'] = 'Failed';
		$data['msg'] = 'User is not registered.';
		echo '<pre>';print_r($data);die;
	}
	mysqli_close($con);
	return json_encode($data);die;
}else{
	echo 'else come here';die;
}