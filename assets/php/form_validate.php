<?php
// define variables and set to empty values
$first_name = $last_name = $email_id = $phone_no = $password = $confirm_password = "";
$upload_profile_error = $first_name_error = $last_name_error = $email_id_error = $phone_no_error = $password_error = $confirm_password_error = "";
$fname = $lname = $email = $phone = $pass = $confirm_pass = '';
$source_path = $destination_path = '';

if (isset($_POST['submit'])) {

	$fname = $_POST["first_name"];
	$lname = $_POST["last_name"];
	$email = $_POST["email_id"];
	$phone = $_POST["phone_no"];
	$pass = $_POST["password"];
	$confirm_pass = $_POST["confirm_password"];
	$first_name = test_input($fname,'first_name');
	$last_name = test_input($lname,'last_name');
	$email_id = test_input($email,'email_id');
	$phone_no = test_input($phone,'phone_no');
	$password = test_input($pass,'password');
	$confirm_password = test_input($confirm_pass,'confirm_password');
	$input_names = ['last_name','email_id','phone_no','password','confirm_password'];
	$Inputs = array_values(compact("first_name",$input_names));
	for ($i=0; $i < count($Inputs); $i++) 
	{
		if ($Inputs[$i] == 1) {
			$All_valid = true;
		} else {
			$All_valid = false;
			break;
		}
	}

	if($All_valid) {
		if(isset($_FILES['upload_profile'])) {
			$fileName = $_FILES['upload_profile']['name'];
			$fileSize =$_FILES['upload_profile']['size'];
			$fileTemp =$_FILES['upload_profile']['tmp_name'];
			$fileError = $_FILES['upload_profile']['error'];
			$fileType=$_FILES['upload_profile']['type'];
			if ($fileError === 0 ) {
				if ( $fileSize < 2097152 ) {
					$fileExt = explode('.', $fileName);
					$fileActualExt = strtolower(end($fileExt));
					$allowed = ['jpg','jpeg','png'];
					if(in_array($fileActualExt, $allowed)) {
						$destination ='assets/uploads/'.$fileName;
					if ( move_uploaded_file($fileTemp,$destination) ) {
						header("Location: register_success.php?image=$destination&name=$fname $lname&email=$email&phone=$phone"); 
					}
				}
				else {
					$GLOBALS['upload_profile_error'] = "Please select image file only";
				}
				}
				else {
				$GLOBALS['upload_profile_error'] = "Please select file less than 2MB";
				}
			}
			else {
				$GLOBALS['upload_profile_error'] = "There was some issue uploading this file";
			}
		} 
		else {
			$GLOBALS['upload_profile_error'] = "No file is selected";
		}
	}
}

function pre_r($array) 
{
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

function test_input($data,$key) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	if(is_valid($key))
	return true;
	else
	return 0;
}

function is_valid($testing_input)
{	
	$regex = ["/([a-zA-Z]){2,20}$/","/([a-zA-Z]){2,20}$/","/^([0-9a-zA-Z\_\.\-]+)@([0-9a-zA-Z\_\.\-]+)\.([a-zA-Z]+)$/","/^\d{10}$/","/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8})/","/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8})/"];
	$Only_inputs = array_slice($_POST, 0, -1);
	foreach ($Only_inputs as $key => $value) 
	{	
		if($Only_inputs["password"] != $Only_inputs["confirm_password"]) {
			errors('confirm_password',$Only_inputs["confirm_password"]);				
		}
		if ($value === '') {
			errors($key,$value);
		} elseif($key == $testing_input) {	
			$index = assoc_index($key,array_keys($Only_inputs));
			$valid = regex_check($regex[$index],$value,$key);
			return $valid;
		}
	}

}

function assoc_index($form_key,$post_keys)
{	 
	foreach ($post_keys as $key => $value) 
	{
		if($form_key === $value) {
			return $key;
		}
	}
}

function regex_check($regex_value,$input_value,$input) 
{	
	if(!preg_match($regex_value,$input_value)) {
		errors($input,$input_value);
	} else {
		return 1;
	}
}


function errors($input,$value)
{	
	if($value === '') {
		$GLOBALS[$input."_error"] = "Please fill the empty field!";
	} else {
		switch ($input) 
		{
			case 'first_name':
				$GLOBALS['first_name_error'] = "Must Contains Only Alphabets.";
				break;
			case 'last_name':
				$GLOBALS['last_name_error'] = "Must Contains Only Alphabets.";
				break;
			case 'email_id':
				$GLOBALS['email_id_error'] = "Entered Email is Invalid.";
				break;
			case 'phone_no':
				$GLOBALS['phone_no_error'] = "Must Contains Only Digits and minimum of 10.";
				break;
			case 'password':
				$GLOBALS['password_error'] = "Must Contains One Alphabet(upperCase & LowerCase each) and a Number and Special Character.";
				break;
			case 'confirm_password':
				$GLOBALS['confirm_password_error'] = "Confirm Password & Password fields must Match";
				break;				
			default:
				break;
		}
	}
}
?>