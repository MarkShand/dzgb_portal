<?php
	function GetServerIP(){
		include('conn.php');
		$sql = "SELECT * FROM `tbl_status` WHERE `id` = '2001'";
		$query = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($query)) {
			$content = $row['content'];
			echo $content;
		}
	}
	function writeTxt($i){
		include('conn.php');
		$sql = "SELECT * FROM `tbl_headlines` WHERE `id` = '$i'";
		$query = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($query)) {
			$content = $row['content'];
				echo file_put_contents("file/headline.txt",$content);
			}
	}
	if (isset($_POST['TextID'])) {
		$id = $_POST['TextID'];
		writeTxt($id);
	}
	function writeNewHeadline($i){
		include('conn.php');
		$sql = "SELECT * FROM `tbl_headlines` WHERE `label` = 'existing' ORDER BY `span` DESC, `id` DESC";
		$query = mysqli_query($conn,$sql);
		$contentArr = array();
		$inputInd = $i - 1;
		while ($row = mysqli_fetch_array($query)) {
			$contentArr[] = $row['content'];
			$spanArr[] = $row['span'];
		}
		if (isset($contentArr[$inputInd])) {
			$content = $contentArr[$inputInd];
			$span = $spanArr[$inputInd];
			echo ucfirst($span)." | ".$content;
			if ($span = 'Local') {
				$con = $content;
				echo $con;
				file_put_contents("file/headline.txt",$con);	
			}else{
				$concat = $span .': '.$content;
				echo $concat;
				file_put_contents("file/headline.txt",$concat);
			}
	    } else {
	    	echo "No Headlines Found!";
	    }
	}
	if (isset($_POST['newNum'])) {
		$newNum = $_POST['newNum'];
		writeNewHeadline($newNum);
	}else{
		echo "No Records Found!";
	}

?>