<?php
require_once ('dbhelp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Management</title>
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
				Quản lý thông tin nhân viên
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo mã nhân viên">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Staff ID</th>
							<th>Full name</th>
							<th>Address</th>
							<th>Email</th>
                            <th>Phone number</th>
                            <th>User name</th>
                            <th>Password</th>
                            <th>Storage ID</th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
                        <?php
                        if (isset($_GET['s']) && $_GET['s'] != '') {
                            $sql = 'select * from staff where id_staff like "%'.$_GET['s'].'%"';
                        } else {
                            $sql = 'select * from staff';
                        }
                        $studentList = executeResult($sql);

                        foreach ($studentList as $std) {
                            echo '<tr>
                                    <td>'.$std['id_staff'].'</td>
                                    <td>'.$std['f_name'].' '.$std['m_name'].' '.$std['l_name'].'</td>
                                    <td>'.$std['address_staff'].'</td>
                                    <td>'.$std['email_staff'].'</td>
                                    <td>'.$std['phone_staff'].'</td>
                                    <td>'.$std['username_staff'].'</td>
                                    <td>'.$std['password_staff'].'</td>
                                    <td>'.$std['id_storage'].'</td>
                                    <td><button class="btn btn-warning" onclick=\'window.open("modifyStaff.php?id='.$std['id_staff'].'","_self")\'>Edit</button></td>
                                </tr>';
                        }
                        ?>
					</tbody>
				</table>
				<button class="btn btn-success" onclick="window.open('addNewStaff.php', '_self')">Add</button>
                <button class="btn btn-success" onclick="window.open('index.php', '_self')">Home page</button>
			</div>
		</div>
	</div>
</body>
</html>