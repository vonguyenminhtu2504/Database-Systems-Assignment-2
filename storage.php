<?php
require_once ('dbhelp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Storage</title>
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
				Quản lý thông tin các kho sách
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên hoặc địa chỉ kho sách">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
                            <th>Storage ID</th>
                            <th>Storage name</th>
							<th>Storage address</th>
                            <th>Storage phone</th>
                            <th>Storage email</th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
                        <?php
                        if (isset($_GET['s']) && $_GET['s'] != '') {
                            $sql = 'select * from storage where n_storage like "%'.$_GET['s'].'%" OR address_storage like "%'.$_GET['s'].'%"';
                        } else {
                            $sql = 'select * from storage';
                        }
                        $studentList = executeResult($sql);

                        foreach ($studentList as $std) {
                            echo '<tr>
                                    <td>'.$std['id_storage'].'</td>
                                    <td>'.$std['n_storage'].'</td>
                                    <td>'.$std['address_storage'].'</td>
                                    <td>'.$std['phone_storage'].'</td>
                                    <td>'.$std['email_storage'].'</td>
									<td><button class="btn btn-warning" onclick=\'window.open("modifyBookStorage.php?id='.$std['id_storage'].'","_self")\'>Edit</button></td>
								</tr>';
                        }
                        ?>
					</tbody>
				</table>
				<button class="btn btn-success" onclick="window.open('addNewBooKStorage.php', '_self')">Add</button>
                <button class="btn btn-success" onclick="window.open('index.php', '_self')">Home page</button>
			</div>
		</div>
	</div>

</body>
</html>