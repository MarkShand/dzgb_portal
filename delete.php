<?php
	function TempDelete($id){
		include('conn.php');
		$label = "deleted";
		$sql = "UPDATE `tbl_headlines` set `label` = '$label' WHERE `id` = '$id'";
		if ($id == ""){
			echo "Error 404 : ".mysql_error();
		}else{
			mysqli_query($conn,$sql);
			echo "Deleted Successfully!";
		}
	}
	function PermanentlyDelete($id){
		include('conn.php');
		$sql = "DELETE FROM `tbl_headlines` WHERE `id` = '$id'";
		if ($id = ""){
			echo "Error Deleting : ".mysql_errno();
		}else{
			mysqli_query($conn,$sql);
			echo "Permanenly Deleted!";
		}
	}
	if (isset($_POST['id'])) {
		TempDelete($_POST['id']);
	}
	if (isset($_POST['PermDeleteID'])) {
		$id = $_POST['PermDeleteID'];
		PermanentlyDelete($id);
	}
?>

