<?php
require_once ('dbhelp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Import Information</title>
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
				Quản lý thông tin nhập kho
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo mã phiếu nhập kho">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Time</th>
							<th>Storage address</th>
                            <th>Name of book</th>
                            <th>Book ID</th>
                            <th>Amount of book</th>
                            <th>Book price</th>
							<th>Staff ID</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
                        <?php
                        if (isset($_GET['s']) && $_GET['s'] != '') {
                            $sql = 'select * from import where id_note like "%'.$_GET['s'].'%"';
                        } else {
                            $sql = 'select * from import';
                        }
                        $studentList = executeResult($sql);

                        foreach ($studentList as $std) {
                            echo '<tr>
                                    <td>'.$std['id_note'].'</td>
                                    <td>'.$std['time'].'</td>
                                    <td>'.$std['storage_address'].'</td>
                                    <td>'.$std['n_book'].'</td>
                                    <td>'.$std['id_book'].'</td>
                                    <td>'.$std['amount_of_book'].'</td>
									<td>'.$std['current_price_of_book'].'</td>
                                    <td>'.$std['id_staff'].'</td>
									<td><button class="btn btn-warning" onclick=\'window.open("modifyImport.php?id='.$std['id_note'].'","_self")\'>Edit</button></td>
									<td><button class="btn btn-danger" onclick="deleteidn('.$std['id_note'].')">Delete</button></td>
                                </tr>';
                        }
                        ?>
					</tbody>
				</table>
				<button class="btn btn-success" onclick="window.open('addNewImport.php', '_self')">Add</button>
                <button class="btn btn-success" onclick="window.open('index.php', '_self')">Home page</button>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteidn(id) {
			option = confirm('Bạn có muốn xoá thông tin nhập kho này không?')
			if(!option) {
				return;
			}

			console.log(id)
			$.post('deleteImport.php', {
				'id': id
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>

</body>
</html>