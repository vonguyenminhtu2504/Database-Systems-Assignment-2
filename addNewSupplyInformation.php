<?php
require_once ('dbhelp.php');

	$s_sid = $s_pname = $s_time = '';

	if (!empty($_POST)) {

		$error = array();

		$sql = 'select * from publisher where n_publisher =' .$_POST['pname'];
    	$storeList = executeResult($sql);
		if ($storeList == NULL) {
        	$error['n_publisher'] = "Tên nhà xuất bản bạn chọn không tồn tại trên hệ thống";
        	echo '<script type="text/javascript">alert("Tên nhà xuất bản bạn chọn không tồn tại trên hệ thống")</script>';
    	}

        $sql = 'select * from staff where id_staff =' .$_POST['sid'];
    	$storeList = executeResult($sql);
		if ($storeList == NULL) {
        	$error['id_staff'] = "Mã nhân viên bạn chọn không tồn tại trên hệ thống";
        	echo '<script type="text/javascript">alert("Mã nhân viên bạn chọn không tồn tại trên hệ thống")</script>';
    	}

        if (isset($_POST['pname'])) {
			$s_pname = $_POST['pname'];
		}

		if (isset($_POST['sid'])) {
			$s_sid = $_POST['sid'];
		}
	
		if (isset($_POST['time'])) {
			$s_time = $_POST['time'];
		}
		
        $s_pname   = str_replace('\'', '\\\'', $s_pname);
        $s_time   = str_replace('\'', '\\\'', $s_time);
		$s_sid    = str_replace('\'', '\\\'', $s_sid);

		if (empty($error)) {
			$sql = "insert into storage_type_of_book(n_publisher, id_staff, supply_time) value('$s_pname', '$s_sid', '$s_time')";
			execute($sql);
			header('Location: supplyBook.php');
			die();
		}
	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Supply Information</title>
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
				<h2 class="text-center">Thêm thông tin cung cấp sách</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="mnv">Publisher name:</label>
					  <input required="true" type="text" class="form-control" id="mnv" name="pname">
					</div>
                    <div class="form-group">
					  <label for="user">Staff ID:</label>
					  <input required="true" type="text" class="form-control" id="user" name="sid">
					</div>
                    <div class="form-group">
					  <label for="mnv">Time:</label>
					  <input required="true" type="date" class="form-control" id="mnv" name="time">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>