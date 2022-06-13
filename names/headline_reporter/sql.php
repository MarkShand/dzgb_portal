<?php
	function sql_array($sql){
		include('conn.php');
		$query = mysqli_query($conn,$sql);
		$data = array();
		if (mysqli_num_rows($query) > 0) {
		 	while ($row = mysqli_fetch_assoc($query)){
		 		$data[] = $row;
		 	}
		}
	}
?>