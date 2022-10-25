<?php
	function UpdateContent(){
		include('conn.php');
		$id = $_POST['id'];
		$content1 = $_POST['content'];
		$span = $_POST['span'];
		//$content = trim(preg_replace('/\s\s+/', ' ', $content));
		$content = str_replace(array("\n", "\r"), '', $content1);
		$sql = "UPDATE `tbl_headlines` set `content` = '$content', `span` = '$span' WHERE `id` = '$id'";
		if ($content == "") {
			echo "No Data!";
		}else{
			mysqli_query($conn,$sql);
			echo "Updated Successfully!";
		}
	}
	if (isset($_POST['id'])) {
		UpdateContent();
	}
	function UpdateStatus($id){
		include('conn.php');
		$sqlStatus = "UPDATE `tbl_status` SET `status` = '$id' WHERE `id` = '2000'";
		if ($id == "") {
			echo "Error Updating Status!";
		}else{
			mysqli_query($conn,$sqlStatus);
			echo "Status Updated Successfully!";
		}				
	}
	if (isset($_POST['UpdateStatus'])) {
		$stat = $_POST['UpdateStatus'];
		UpdateStatus($stat);
	}
	function UpdateServer(){
		include('conn.php');
		$stat = $_POST['UpdateServer'];
		$sqlServer = "UPDATE `tbl_status` SET `content` = '$ip' WHERE `id` = '2001'";
		if ($stat = '') {
			echo "Error Updating Status!";
		}else{
			mysqli_query($conn,$sqlServer);
			echo "Status Updated Successfully!";
		}				
	}
	if (isset($_POST['UpdateServer'])) {
		UpdateServer();
	}
?>