<?php
	include('conn.php');
	date_default_timezone_set('Asia/Manila');
	$label = "existing";
	$content = $_POST['content'];
	$span = $_POST['span'];
	$content = trim(preg_replace('/\s\s+/', ' ', $content));
	$date = date("Y-m-d H:i:s");
	$encoded_by = "admin";
	$sql = "INSERT INTO `tbl_headlines` (`id`, `label`, `span`, `content`, `date`, `encoded_by`) VALUES (NULL,'$label','$span','$content','$date','$encoded_by')";
	if ($content == "") {
		echo "No Data!";
	}else{
		mysqli_query($conn,$sql);
		echo "Added Successfully!";
	}
	//INSERT INTO `tbl_headlines` (`id`, `label`, `content`, `date`, `encoded_by`) VALUES (NULL, 'existing', 'Sampulong ayam an nalugadan sa engkwentro sa mamasapano kasubagong udto', '2022-05-03 10:44:32.000000', '');
?>