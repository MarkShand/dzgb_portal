<?php
	include('conn.php');
	
	$num = $_POST['num'];

	$sqlNational = "SELECT * FROM `tbl_headlines` WHERE `label` = 'existing' AND `span` = 'National'";
	
	$sqlLocal = "SELECT * FROM `tbl_headlines` WHERE `label` = 'existing' AND `span` = 'Local'";
	

	$queryNational = mysqli_query($conn,$sqlNational);
	$queryLocal = mysqli_query($conn,$sqlLocal);

	$IntNational = mysqli_num_rows($queryNational);
	$IntLocal = mysqli_num_rows($queryLocal);

	$sumRows = $IntLocal + $IntNational;

	$numrows = $sumRows - 1;

	if (isset($_POST['num'])) {
		if ($num <= $numrows) {
			echo $num + 1;
		}else{
			echo 1;
		}
	}
?>