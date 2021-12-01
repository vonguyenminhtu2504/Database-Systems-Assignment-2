<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('dbhelp.php');
	$sql = 'delete from contact where id_staff = '.$id;
	execute($sql);

	echo 'Xoá mối liên kết thành công';
}