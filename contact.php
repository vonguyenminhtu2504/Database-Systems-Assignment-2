<?php
require_once ('dbhelp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
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
				Thông tin liên lạc giữa nhân viên và tác giả
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo mã nhân viên hoặc mã tác giả">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
                            <th>Staff ID</th>
							<th>Staff Full Name</th>
							<th>Author ID</th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
                        <?php
                        if (isset($_GET['s']) && $_GET['s'] != '') {
                            $sql = 'select staff.id_staff, concat(f_name, " ", m_name, " ", l_name), id_author
									from staff, contact
									where staff.id_staff = contact.id_staff AND (id_author like "%'.$_GET['s'].'%" OR id_staff like "%'.$_GET['s'].'%")
									order by id_author ASC';
                        } else {
                            $sql = 'select staff.id_staff, concat(f_name, " ", m_name, " ", l_name), id_author
									from staff, contact
									where staff.id_staff = contact.id_staff
									order by id_author ASC';
                        }
                        $studentList = executeResult($sql);

                        foreach ($studentList as $std) {
                            echo '<tr>
                                    <td>'.$std['id_staff'].'</td>
									<td>'.$std['concat(f_name, " ", m_name, " ", l_name)'].'</td>
									<td>'.$std['id_author'].'</td>
									<td><button class="btn btn-danger" onclick="deleteContact('.$std['id_staff'].')">Delete</button></td>
                                </tr>';
                        }
                        ?>
					</tbody>
				</table>
				<button class="btn btn-success" onclick="window.open('addNewContact.php', '_self')">Add</button>
                <button class="btn btn-success" onclick="window.open('index.php', '_self')">Home page</button>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteContact(id) {
			option = confirm('Bạn có muốn xoá mối liên kết này không')
			if(!option) {
				return;
			}

			console.log(id)
			$.post('deleteContact.php', {
				'id': id
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>

</body>
</html>