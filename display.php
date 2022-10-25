<?php
	function TBL_HEADER(){
		echo "
		<table class=\"table table-hover table-striped mt-3\">
		<thead>
			<tr>
			   <th scope=\"col\">No.</th>
			 	<th scope=\"col\">Headline</th>
			   <th scope=\"col\">Actions</th>
		   </tr>
		</thead>
		  ";
	}
	function TBL_BODY($span){
		include('conn.php');
		$sql = "SELECT * FROM `tbl_headlines` WHERE `label` = 'existing' AND `span` = '$span' ORDER BY `id` DESC";
			$query = mysqli_query($conn,$sql);
			if (mysqli_num_rows($query) > 0) {
				$i = mysqli_num_rows($query);
				$num = 1;
				while(($row = mysqli_fetch_array($query)) && ($num <= $i)){
					$date = $row['date'];
					echo
						"<tr>
							<td>".$num++."</td>
							<td>".$row['content']."</td>

							<td>
								<button onclick=\"edit('".$row['id']."');\" class=\"btn btn-outline-info btn-sm\"><i class=\"oi oi-pencil\"></i></button>
								<button onclick=\"swalDel('".$row['id']."');\" class=\"btn btn-outline-danger btn-sm\"><i class=\"oi oi-trash\"></i></button>
								<button onclick=\"UpdateHeadline('".$row['id']."');\" class=\"btn btn-outline-light btn-sm\"><i class=\"oi oi-share\"></i></button>
							</td>
						</tr>
					";
				}
			}else{
				echo "
				<tr>
					<td colspan=\"5\">No Headlines Found</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				";
			}
	}
//------------------------------------------Deleted
	function TBL_HEADERDeleted(){
		echo "
		<table class=\"table table-hover table-striped mt-3\">
		<thead>
			<tr>
			   	<th scope=\"col\">No.</th>
			   	<th scope=\"col\">Status</th>
			 	<th scope=\"col\">Headline</th>
			 	<th scope=\"col\">Headline</th>
			   	<th scope=\"col\">Actions</th>
		   </tr>
		</thead>
		  ";
	}

	function TBL_BODYDeleted($label){
		include('conn.php');
		$sql = "SELECT * FROM `tbl_headlines` WHERE `label` = '$label' ORDER BY `id` DESC LIMIT 10";
			$query = mysqli_query($conn,$sql);
			if (mysqli_num_rows($query) > 0) {
				$i = mysqli_num_rows($query);
				$num = 1;
				while(($row = mysqli_fetch_array($query)) && ($num <= $i)){
					$date = $row['date'];
					echo
						"<tr>
							<td>".$num++."</td>
							<td>".ucfirst($row['label'])."</td>
							<td>".$row['span']."</td>
							<td>".$row['content']."</td>
							<td>
								";//<button onclick=\"RestoreDeleted('".$row['id']."');\" class=\"btn btn-outline-info btn-sm\"><i class=\"oi oi-loop-circular\"></i></button>
								echo "<button onclick=\"PermanentlyDelete('".$row['id']."');\" class=\"btn btn-outline-danger btn-sm\"><i class=\"oi oi-trash\"></i></button>
							</td>
						</tr>
					";
				}
			}else{
				echo "
				<tr>
					<td colspan=\"6\">No Headlines Found!</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				";
			}
	}
//------------------------------------DISPLAY TABLES
	
	function DisplayLocal(){
		  TBL_HEADER();
			echo "<tbody>";
		  	TBL_BODY('Local');
		  echo "</tbody></table>";
	}
	function DisplayNational(){
		TBL_HEADER();
			echo "
		  	<tbody>";
		  		TBL_BODY('National');
		  		echo "
			</tbody>
		</table>";
	} 
	function DisplayDeleted(){
		TBL_HEADERDeleted();
			echo "
		  	<tbody>";
		  		TBL_BODYDeleted('deleted');
		  		echo "
			</tbody>
		</table>";
	}
		
	function DisplayStandby(){
		  TBL_HEADER(); 
		  echo "<tbody>"; TBL_BODY('Standby');
		  echo "</tbody></table>";
	}
	function DisplayCrawlOnly(){
		  TBL_HEADER(); 
		  echo "<tbody>"; TBL_BODY('Crawl');
		  echo "</tbody></table>";
	}	

//---------------------------------------DISPLAY

	function DisplayStatus(){
		include('conn.php');
		$sqlStatus = "SELECT * FROM `tbl_status` WHERE `label` = 'headline'";
		$queryStatus = mysqli_query($conn,$sqlStatus);
		if (mysqli_num_rows($queryStatus) > 0) {
			while ($row = mysqli_fetch_array($queryStatus)) {
				$status = $row['status'];
				echo "
				<input class=\"form-control\" style=\"visibility:hidden;\"  type=\"text\" id=\"timer\" value=\"".$status."\">
				";
			}
		}
		//style=\"visibility:hidden;\"
	}
	function DisplayServer(){
		include('conn.php');
		$sqlSelectServer = "SELECT * FROM `tbl_status` WHERE `id` = '2001'";
		$querySelectServer = mysqli_query($conn,$sqlSelectServer);
		if (mysqli_num_rows($querySelectServer) > 0) {
			while ($row = mysqli_fetch_array($querySelectServer)) {
				$ipaddress = $row['content'];
			}
			if ($ipaddress != $ip) {
				echo "<h4>Non Server</h4>";
			}else{
				echo "<h4>Server</h4>";
			}
		}
	}

//--------------------START CALL FUNCTION--------

	if (isset($_POST['local'])){
		DisplayLocal();
	}
	if (isset($_POST['national'])){
		DisplayNational();
	}
	if (isset($_POST['status'])){
		DisplayStatus();
	}
	if (isset($_POST['ServerIP'])) {
		DisplayServer();
	}if (isset($_POST['deleted'])) {
		DisplayDeleted();
	}if (isset($_POST['Standby'])) {
		DisplayStandby();
	}if (isset($_POST['Crawl'])) {
		DisplayCrawlOnly();
	}
?>