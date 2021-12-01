<?php
require_once ('dbhelp.php');

	$s_auid = $s_staid = '';

	if (!empty($_POST)) {

		$error = array();

		$sql = 'select * from author where id_author =' .$_POST['aid'];
    	$storeList = executeResult($sql);
		if ($storeList == NULL) {
        	$error['id_author'] = "Mã tác giả bạn chọn không tồn tại trên hệ thống";
        	echo '<script type="text/javascript">alert("Mã tác giả bạn chọn không tồn tại trên hệ thống")</script>';
    	}

		$sql = 'select * from staff where id_staff =' .$_POST['sid'];
    	$staffList = executeResult($sql);
		if ($staffList == NULL) {
        	$error['id_staff'] = "Mã nhân viên bạn chọn không tồn tại trên hệ thống";
        	echo '<script type="text/javascript">alert("Mã nhân viên bạn chọn không tồn tại trên hệ thống")</script>';
    	}

		if (isset($_POST['aid'])) {
			$s_auid = $_POST['aid'];
		}
	
		if (isset($_POST['sid'])) {
			$s_staid = $_POST['sid'];
		}
		
		$s_auid    = str_replace('\'', '\\\'', $s_auid);
		$s_staid   = str_replace('\'', '\\\'', $s_staid);

		if (empty($error)) {
			$sql = "insert into contact(id_author, id_staff) value('$s_auid', '$s_staid')";
			execute($sql);
			header('Location: contact.php');
			die();
		}
	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Contact</title>
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
				<h2 class="text-center">Thêm mối liên kết mới</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="mnv">Author ID:</label>
					  <input required="true" type="text" class="form-control" id="mnv" name="aid">
					</div>
                    <div class="form-group">
					  <label for="user">Staff ID:</label>
					  <input required="true" type="text" class="form-control" id="user" name="sid">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>