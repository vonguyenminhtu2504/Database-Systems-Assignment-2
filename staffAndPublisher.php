<?php
require_once ('dbhelp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff and Publisher</title>
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
				Thông tin cung cấp sách giữa nhà xuất bản và nhân viên
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên nhà xuất bản">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Full name</th>
							<th>Email</th>
                            <th>Phone number</th>
                            <th>Storage ID</th>
                            <th>Publisher name</th>
                            <th>Supply time</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                        if (isset($_GET['s']) && $_GET['s'] != '') {
                            $sql = 'SELECT staff.id_staff, staff.f_name, staff.m_name, staff.l_name, staff.email_staff, staff.phone_staff, staff.id_storage, supply_book.n_publisher, supply_book.supply_time
                                    FROM staff, supply_book
                                    WHERE staff.id_staff = supply_book.id_staff AND supply_book.n_publisher like "%'.$_GET['s'].'%"
                                    ORDER BY staff.id_staff ASC';
                        } else {
                            $sql = 'SELECT staff.id_staff, staff.f_name, staff.m_name, staff.l_name, staff.email_staff, staff.phone_staff, staff.id_storage, supply_book.n_publisher, supply_book.supply_time
                                    FROM staff, supply_book
                                    WHERE staff.id_staff = supply_book.id_staff
                                    ORDER BY staff.id_staff ASC';
                        }
                        $studentList = executeResult($sql);

                        foreach ($studentList as $std) {
                            echo '<tr>
                                    <td>'.$std['id_staff'].'</td>
                                    <td>'.$std['f_name'].' '.$std['m_name'].' '.$std['l_name'].'</td>
                                    <td>'.$std['email_staff'].'</td>
                                    <td>'.$std['phone_staff'].'</td>
                                    <td>'.$std['id_storage'].'</td>
                                    <td>'.$std['n_publisher'].'</td>
                                    <td>'.$std['supply_time'].'</td>
                                </tr>';
                        }
                        ?>
					</tbody>
				</table>
                <button class="btn btn-success" onclick="window.open('index.php', '_self')">Home page</button>
			</div>
		</div>
	</div>
</body>
</html>