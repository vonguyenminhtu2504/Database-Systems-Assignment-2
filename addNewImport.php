<?php
require_once ('dbhelp.php');
	$s_id = $s_sname = $s_time = $s_address = $s_bname = $s_bid = $s_ammount = $s_price = $s_sid = '';

	if (!empty($_POST)) {

		$error = array();

        $sql = 'select * from import where id_note =' .$_POST['nid'];
    	$idList = executeResult($sql);
    	if ($idList != NULL) {
        	$error['id_note'] = "Mã phiếu này đã tồn tại trên hệ thống";
        	echo '<script type="text/javascript">alert("Mã phiếu này đã tồn tại trên hệ thống")</script>';
    	}

    	$sql = 'select * from staff where id_staff =' .$_POST['sid'];
    	$staffList = executeResult($sql);
    	if ($staffList == NULL) {
        	$error['id_staff'] = "Mã nhân viên bạn chọn không tồn tại trên hệ thống";
        	echo '<script type="text/javascript">alert("Mã nhân viên bạn chọn không tồn tại trên hệ thống")</script>';
    	}
		
		if (isset($_POST['nid'])) {
			$s_id = $_POST['nid'];
		}
	
		if (isset($_POST['sname'])) {
			$s_sname = $_POST['sname'];
		}
	
		if (isset($_POST['time'])) {
			$s_time = $_POST['time'];
		}
	
		if (isset($_POST['address'])) {
			$s_address = $_POST['address'];
		}
	
		if (isset($_POST['bname'])) {
			$s_bname = $_POST['bname'];
		}
	
		if (isset($_POST['bid'])) {
			$s_bid = $_POST['bid'];
		}
	
		if (isset($_POST['ammount'])) {
			$s_ammount = $_POST['ammount'];
		}
	
		if (isset($_POST['price'])) {
			$s_price = $_POST['price'];
		}
	
		if (isset($_POST['sid'])) {
			$s_sid = $_POST['sid'];
		}
		
		$s_id       = str_replace('\'', '\\\'', $s_id);
		$s_sname    = str_replace('\'', '\\\'', $s_sname);
		$s_time     = str_replace('\'', '\\\'', $s_time);
		$s_address  = str_replace('\'', '\\\'', $s_address);
		$s_bname    = str_replace('\'', '\\\'', $s_bname);
		$s_bid      = str_replace('\'', '\\\'', $s_bid);
		$s_ammount  = str_replace('\'', '\\\'', $s_ammount);
		$s_price    = str_replace('\'', '\\\'', $s_price);
		$s_sid      = str_replace('\'', '\\\'', $s_sid);

		if (empty($error)) {
			$sql = "insert into import(id_note,n_staff,time,storage_address,n_book,id_book,amount_of_book,current_price_of_book,id_staff) value('$s_id', '$s_sname', '$s_time', '$s_address', '$s_bname', '$s_bid', '$s_ammount', '$s_price', '$s_sid')";
			execute($sql);
			header('Location: import.php');
			die();
		}
	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Import Note</title>
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
				<h2 class="text-center">Thêm thông tin nhập kho mới</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="mnv">Note ID:</label>
					  <input required="true" type="text" class="form-control" id="mnv" name="nid">
					</div>
					<div class="form-group">
					  <label for="fn">Staff name:</label>
					  <input required="true" type="text" class="form-control" id="fn" name="sname">
					</div>
                    <div class="form-group">
					  <label for="pass">Staff ID:</label>
					  <input required="true" type="text" class="form-control" id="pass" name="sid">
					</div>
					<div class="form-group">
					  <label for="mn">time:</label>
					  <input required="true" type="date" class="form-control" id="mn" name="time">
					</div>
					<div class="form-group">
					  <label for="ln">Store address:</label>
					  <input required="true" type="text" class="form-control" id="ln" name="address">
					</div>
					<div class="form-group">
					  <label for="address">Book ID:</label>
					  <input required="true" type="text" class="form-control" id="address" name="bid">
					</div>
					<div class="form-group">
					  <label for="email">Book name:</label>
					  <input required="true" type="text" class="form-control" id="email" name="bname">
					</div>
					<div class="form-group">
					  <label for="phone">Book ammount:</label>
					  <input required="true" type="text" class="form-control" id="phone" name="ammount">
					</div>
					<div class="form-group">
					  <label for="user">Book Price:</label>
					  <input required="true" type="text" class="form-control" id="user" name="price">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>