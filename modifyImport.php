<?php
require_once ('dbhelp.php');
	$s_id = $s_sname = $s_time = $s_address = $s_bname = $s_bid = $s_ammount = $s_price = $s_sid = '';

	if (!empty($_POST)) {

		$error = array();

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

		$s_time     = str_replace('\'', '\\\'', $s_time);
		$s_address  = str_replace('\'', '\\\'', $s_address);
		$s_bname    = str_replace('\'', '\\\'', $s_bname);
		$s_bid      = str_replace('\'', '\\\'', $s_bid);
		$s_ammount  = str_replace('\'', '\\\'', $s_ammount);
		$s_price    = str_replace('\'', '\\\'', $s_price);
		$s_sid      = str_replace('\'', '\\\'', $s_sid);

		if (empty($error)) {
			$sql = "update import set n_staff = '$s_sname', time = '$s_time', storage_address = '$s_address', n_book = '$s_bname', id_book = '$s_bid', amount_of_book = '$s_ammount', current_price_of_book = '$s_price', id_staff = '$s_sid' where id_note = " .$s_id;
			execute($sql);
			header('Location: import.php');
			die();
		}
	
	}

	$id = '';
	if (isset($_GET['id'])) {
		$id          = $_GET['id'];
		$sql         = 'select * from import where id_note = '.$id;
		$idnList   = executeResult($sql);
		if ($idnList != null) {
			$std         = $idnList[0];
			$ss_time	 = $std['time'];
			$ss_address  = $std['storage_address'];
			$ss_bname    = $std['n_book'];
			$ss_bid      = $std['id_book'];
			$ss_ammount  = $std['amount_of_book'];
			$ss_price    = $std['current_price_of_book'];
			$ss_sid      = $std['id_staff'];
		} else {
			$id = '';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modify Import Note</title>
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
				<h2 class="text-center">Chỉnh sửa dữ liệu nhập kho</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="mnv">Note ID:</label> <?php echo $id;?>
					  <input style="display: none;" type="text" class="form-control" id="mnv" name="nid" value="<?=$id?>">
					</div>

                    <div class="form-group">
					  <label for="pass">Staff ID:</label>
					  <input required="true" type="text" class="form-control" id="pass" name="sid" value="<?=$ss_sid?>">
					</div>
					<div class="form-group">
					  <label for="mn">time:</label>
					  <input required="true" type="datetime" class="form-control" id="mn" name="time" value="<?=$ss_time?>">
					</div>
					<div class="form-group">
					  <label for="ln">Store address:</label>
					  <input required="true" type="text" class="form-control" id="ln" name="address" value="<?=$ss_address?>">
					</div>
					<div class="form-group">
					  <label for="address">Book ID:</label>
					  <input required="true" type="text" class="form-control" id="address" name="bid" value="<?=$ss_bid?>">
					</div>
					<div class="form-group">
					  <label for="email">Book name:</label>
					  <input required="true" type="text" class="form-control" id="email" name="bname" value="<?=$ss_bname?>">
					</div>
					<div class="form-group">
					  <label for="phone">Book ammount:</label>
					  <input required="true" type="text" class="form-control" id="phone" name="ammount" value="<?=$ss_ammount?>">
					</div>
					<div class="form-group">
					  <label for="user">Book Price:</label>
					  <input required="true" type="text" class="form-control" id="user" name="price" value="<?=$ss_price?>">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>