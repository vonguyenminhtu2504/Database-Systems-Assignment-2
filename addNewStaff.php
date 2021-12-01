<?php
require_once ('dbhelp.php');
	$s_id = $s_fname = $s_mname = $s_lname = $s_address = $s_email = $s_phone = $s_user = $s_pass = $s_sid = '';

	if (!empty($_POST)) {

		$error = array();

    	$sql = 'select * from staff where id_staff =' .$_POST['id'];
    	$staffList = executeResult($sql);
    	if ($staffList != NULL) {
        	$error['id_staff'] = "Mã nhân viên này đã tồn tại trên hệ thống";
        	echo '<script type="text/javascript">alert("Mã nhân viên này đã tồn tại trên hệ thống")</script>';
    	}

		$sql = 'select * from storage where id_storage =' .$_POST['sid'];
    	$storeList = executeResult($sql);
		if ($storeList == NULL) {
        	$error['id_storage'] = "Mã hiệu sách bạn chọn không tồn tại trên hệ thống";
        	echo '<script type="text/javascript">alert("Mã hiệu sách bạn chọn không tồn tại trên hệ thống")</script>';
    	}
		
		if (isset($_POST['id'])) {
			$s_id = $_POST['id'];
		}
	
		if (isset($_POST['fname'])) {
			$s_fname = $_POST['fname'];
		}
	
		if (isset($_POST['mname'])) {
			$s_mname = $_POST['mname'];
		}
	
		if (isset($_POST['lname'])) {
			$s_lname = $_POST['lname'];
		}
	
		if (isset($_POST['address'])) {
			$s_address = $_POST['address'];
		}
	
		if (isset($_POST['email'])) {
			$s_email = $_POST['email'];
		}
	
		if (isset($_POST['phone'])) {
			$s_phone = $_POST['phone'];
		}
	
		if (isset($_POST['user'])) {
			$s_user = $_POST['user'];
		}
	
		if (isset($_POST['pass'])) {
			$s_pass = $_POST['pass'];
		}
	
		if (isset($_POST['sid'])) {
			$s_sid = $_POST['sid'];
		}
		
		$s_id       = str_replace('\'', '\\\'', $s_id);
		$s_fname    = str_replace('\'', '\\\'', $s_fname);
		$s_mname    = str_replace('\'', '\\\'', $s_mname);
		$s_lname    = str_replace('\'', '\\\'', $s_lname);
		$s_address  = str_replace('\'', '\\\'', $s_address);
		$s_email    = str_replace('\'', '\\\'', $s_email);
		$s_phone    = str_replace('\'', '\\\'', $s_phone);
		$s_user     = str_replace('\'', '\\\'', $s_user);
		$s_pass     = str_replace('\'', '\\\'', $s_pass);
		$s_sid      = str_replace('\'', '\\\'', $s_sid);

		if (empty($error)) {
			$sql = "insert into staff(f_name,m_name,l_name,address_staff,email_staff,phone_staff,password_staff,username_staff,id_staff,id_storage) value('$s_fname', '$s_mname', '$s_lname', '$s_address', '$s_email', '$s_phone', '$s_user', '$s_pass', '$s_id', '$s_sid')";
			execute($sql);
			header('Location: staff.php');
			die();
		}
	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Staff</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm nhân viên mới</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="mnv">Staff ID:</label>
					  <input required="true" type="text" class="form-control" id="mnv" name="id">
					</div>
					<div class="form-group">
					  <label for="fn">First name:</label>
					  <input required="true" type="text" class="form-control" id="fn" name="fname">
					</div>
					<div class="form-group">
					  <label for="mn">Middle name:</label>
					  <input required="true" type="text" class="form-control" id="mn" name="mname">
					</div>
					<div class="form-group">
					  <label for="ln">Last name:</label>
					  <input required="true" type="text" class="form-control" id="ln" name="lname">
					</div>
					<div class="form-group">
					  <label for="address">Address:</label>
					  <input type="text" class="form-control" id="address" name="address">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input type="text" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
					  <label for="phone">Phone number:</label>
					  <input type="text" class="form-control" id="phone" name="phone">
					</div>
					<div class="form-group">
					  <label for="user">User name:</label>
					  <input required="true" type="text" class="form-control" id="user" name="user">
					</div>
					<div class="form-group">
					  <label for="pass">Password:</label>
					  <input required="true" type="text" class="form-control" id="pass" name="pass">
					</div>
					<div class="form-group">
					  <label for="sid">Strorage ID:</label>
					  <input required="true" type="text" class="form-control" id="sid" name="sid">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>