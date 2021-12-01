<?php
require_once ('dbhelp.php');

	$s_id = $s_fname = $s_mname = $s_lname = $s_address = $s_email = $s_phone = $s_user = $s_pass = $s_sid = '';

	if (!empty($_POST)) {

		$error = array();

		$sql = 'select * from storage where id_storage = ' .$_POST['sid'];
    	$storeList = executeResult($sql);
		if ($storeList == NULL) {
        	$error['id_storage'] = "Mã kho sách bạn chọn không tồn tại trên hệ thống";
        	echo '<script type="text/javascript">alert("Mã kho sách bạn chọn không tồn tại trên hệ thống")</script>';
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
			$sql = "update staff set f_name = '$s_fname', m_name = '$s_mname', l_name = '$s_lname', address_staff = '$s_address', email_staff = '$s_email', phone_staff = '$s_phone', username_staff = '$s_user', password_staff = '$s_pass', id_storage = '$s_sid' where id_staff = " .$s_id;
			execute($sql);
			header('Location: staff.php');
			die();
		}
	}

	$id = '';
	if (isset($_GET['id'])) {
		$id          = $_GET['id'];
		$sql         = 'select * from staff where id_staff = '.$id;
		$staffList   = executeResult($sql);
		if ($staffList != null) {
			$std        = $staffList[0];
			$ss_fname    = $std['f_name'];
			$ss_mname    = $std['m_name'];
			$ss_lname    = $std['l_name'];
			$ss_address  = $std['address_staff'];
			$ss_email    = $std['email_staff'];
			$ss_phone    = $std['phone_staff'];
			$ss_user     = $std['username_staff'];
			$ss_pass     = $std['password_staff'];
			$ss_sid      = $std['id_storage'];
		} else {
			$id = '';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modify Staff Information</title>
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
				<h2 class="text-center">Chỉnh sửa dữ liệu của nhân viên</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="mnv">Staff ID: </label> <?php echo $id;?>
					  <input style="display: none;" type="text" class="form-control" id="mnv" name="id" value="<?=$id?>">
					</div>
					<div class="form-group">
					  <label for="fn">First name:</label>
					  <input required="true" type="text" class="form-control" id="fn" name="fname" value="<?=$ss_fname?>">
					</div>
					<div class="form-group">
					  <label for="mn">Middle name:</label>
					  <input required="true" type="text" class="form-control" id="mn" name="mname" value="<?=$ss_mname?>">
					</div>
					<div class="form-group">
					  <label for="ln">Last name:</label>
					  <input required="true" type="text" class="form-control" id="ln" name="lname" value="<?=$ss_lname?>">
					</div>
					<div class="form-group">
					  <label for="address">Address:</label>
					  <input type="text" class="form-control" id="address" name="address" value="<?=$ss_address?>">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input type="text" class="form-control" id="email" name="email" value="<?=$ss_email?>">
					</div>
					<div class="form-group">
					  <label for="phone">Phone number:</label>
					  <input type="text" class="form-control" id="phone" name="phone" value="<?=$ss_phone?>">
					</div>
					<div class="form-group">
					  <label for="user">User name:</label>
					  <input required="true" type="text" class="form-control" id="user" name="user" value="<?=$ss_user?>">
					</div>
					<div class="form-group">
					  <label for="pass">Password:</label>
					  <input required="true" type="text" class="form-control" id="pass" name="pass" value="<?=$ss_pass?>">
					</div>
					<div class="form-group">
					  <label for="sid">Strorage ID:</label>
					  <input required="true" type="text" class="form-control" id="sid" name="sid" value="<?=$ss_sid?>">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>