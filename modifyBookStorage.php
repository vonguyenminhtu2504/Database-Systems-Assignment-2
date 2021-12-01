<?php
require_once ('dbhelp.php');

    $s_id = $s_name = $s_address = $s_email = $s_phone = '';

	if (!empty($_POST)) {

		if (isset($_POST['id'])) {
			$s_id = $_POST['id'];
		}
	
		if (isset($_POST['name'])) {
			$s_name = $_POST['name'];
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
		
		$s_id       = str_replace('\'', '\\\'', $s_id);
		$s_name    = str_replace('\'', '\\\'', $s_name);
		$s_address  = str_replace('\'', '\\\'', $s_address);
		$s_email    = str_replace('\'', '\\\'', $s_email);
		$s_phone    = str_replace('\'', '\\\'', $s_phone);

		$sql = "update storage set email_storage = '$s_email', phone_storage = '$s_phone', n_storage = '$s_name', address_storage = '$s_address' where id_storage = " .$s_id;
		execute($sql);
		header('Location: storage.php');
		die();
	}

	$id = '';
	if (isset($_GET['id'])) {
		$id          = $_GET['id'];
		$sql         = 'select * from storage where id_storage = '.$id;
		$storeList   = executeResult($sql);
		if ($storeList != null) {
			$std        = $storeList[0];
			$ss_name    = $std['n_storage'];
			$ss_address  = $std['address_storage'];
			$ss_email    = $std['email_storage'];
			$ss_phone    = $std['phone_storage'];
		} else {
			$id = '';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modify Book Storage Information</title>
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
				<h2 class="text-center">Chỉnh sửa dữ liệu của kho sách</h2>
			</div>
			<div class="panel-body">
				<form method="post">
                    <div class="form-group">
					  <label for="mnv">Storage ID:</label> <?php echo $id;?>
					  <input style="display: none;" type="text" class="form-control" id="mnv" name="id" value="<?=$id?>">
					</div>
                    <div class="form-group">
					  <label for="user">Storage name:</label>
					  <input required="true" type="text" class="form-control" id="user" name="name" value="<?=$ss_name?>">
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
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>