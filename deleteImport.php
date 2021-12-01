<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('dbhelp.php');
	$sql = 'delete from import where id_note = '.$id;
	execute($sql);

	echo 'Xoá thông tin nhập kho thành công';
}