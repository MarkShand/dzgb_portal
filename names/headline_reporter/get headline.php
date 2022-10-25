<?php
	function SearchHeadline($keyword){
		include('conn.php');
		$sql = "SELECT * FROM tbl_on_the_spot_headline WHERE headline LIKE '%$keyword%' OR program_name LIKE '%$keyword%' OR reporter LIKE '%$keyword%' OR reporter_location LIKE '%$keyword%' ORDER BY id DESC";
		$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query) > 0) {
			while($row = mysqli_fetch_array($query)){
				$id = $row['id'];
				$program = $row['program_name'];
				$headline = $row['headline'];
				$reporter = $row['reporter'];
				$location = $row['reporter_location'];
				echo '<li onclick="ActiveHeadline();" id="name'.$id.'" class="list-group-item list-group-item-action btn btn-outline-info mt-2">
						<div class="program">'.$program.'</div>
						<hr>
						<div class="reporter">'.$reporter.'</div>
						<hr>
						<div class="headline">'.$headline.'</div>
						<div id="editHeadline"></div>
						<hr>
						<div class="location" style="display: none;">'.$location.'</div>
						<button id="autoShow" class="btn btn-outline-success btn-sm" onclick="AutoShow();">Show</button>
						<button id="autoShow" class="btn btn-outline-warning btn-sm" onclick="sendAnimationOut(\'animateOut\',\'Hide\');">Hide</button>
						<button class="btn btn-outline-info btn-sm" onclick="editData('.$id.');">Edit</button>
						<button id="confirm'.$id.'" class="btn btn-outline-danger btn-sm" onclick="remove('.$id.');">Remove</button>
						<button id="remove'.$id.'" class="btn btn-outline-danger btn-sm hide" onclick="confirmRemove('.$id.');">Confirm Remove</button>
						<button id="cancel'.$id.'" class="btn btn-outline-warning btn-sm hide" onclick="cancelRemove('.$id.');">Cancel</button>
					</li>
					';
			}
		}else{
			echo '<li id="no_result" class="list-group-item list-group-item-action btn btn-outline-info mt-2 disabled">No Headlines Found</li>';
		}
	}
	function DisplayHeadline(){
		include('conn.php');
		$sql = "SELECT * FROM tbl_on_the_spot_headline ORDER BY id DESC";
		$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query) > 0) {
			while($row = mysqli_fetch_array($query)){
				$id = $row['id'];
				$program = $row['program_name'];
				$headline = $row['headline'];
				$reporter = $row['reporter'];
				$location = $row['reporter_location'];
				echo '
					<li onclick="ActiveHeadline();" id="name'.$id.'" class="list-group-item list-group-item-action btn btn-outline-info mt-3">
						<div class="program">'.$program.'</div>
						<hr>
						<div class="reporter">'.$reporter.'</div>
						<hr>
						<div class="headline"><b>'.$headline.'</b></div>
						<hr>
						<div class="location" style="display: none;">'.$location.'</div>
						<button id="autoShow" class="btn btn-outline-success btn-sm" onclick="AutoShow();">Show</button>
						<button id="autoShow" class="btn btn-outline-warning btn-sm" onclick="sendAnimationOut(\'animateOut\',\'Hide\');">Hide</button>
						<button class="btn btn-outline-info btn-sm" onclick="edit_Headline('.$id.');">Edit</button>
						<button id="confirm'.$id.'" class="btn btn-outline-danger btn-sm" onclick="remove('.$id.');">Remove</button>
						<button id="remove'.$id.'" class="btn btn-outline-danger btn-sm hide" onclick="confirmRemove('.$id.');">Confirm Remove</button>
						<button id="cancel'.$id.'" class="btn btn-outline-warning btn-sm hide" onclick="cancelRemove('.$id.');">Cancel</button>
					</li>
				';
			}
		}else{
			echo '<li id="no_result" class="list-group-item list-group-item-action btn btn-outline-info mt-2 disabled">No Headlines Found</li>';
		}
	}

	function DisplayReporter(){
		include('conn.php');
		$sql = "SELECT * FROM tbl_reporter";
		$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query) > 0) {
			while($row = mysqli_fetch_array($query)){
				$id = $row['id'];
				$reporter = $row['reporter'];
				echo '<option value="'.$id.'">'.$reporter.'</option>';
			}
		}
	}
	function display_Program(){
		include('conn.php');
		$sql = "SELECT * FROM tbl_programs";
		$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query) > 0) {
		 	while ($row = mysqli_fetch_assoc($query)){
				$id = $row['id'];
				$program = $row['program_name'];
				echo '<option value="'.$program.'">'.$program.'</option>';
		 	}
		}
	}
	function DisplayReporterDefaultLocation($id){
		include('conn.php');
		$sql_sel_default_location = "SELECT * FROM tbl_reporter WHERE `id` = '$id'";
		$query_default_location = mysqli_query($conn,$sql_sel_default_location);
		if (mysqli_num_rows($query_default_location) > 0) {
			while($row_default_location = mysqli_fetch_array($query_default_location)){
				$default_location = $row_default_location['default_location'];
				echo '<option value="'.$default_location.'" selected>'.$default_location.'</option>';

				$sql_reporter_location = "SELECT * FROM tbl_reporter_location WHERE NOT `reporter_location` = '$default_location'";
				$query_reporter_location = mysqli_query($conn,$sql_reporter_location);
				if (mysqli_num_rows($query_reporter_location) > 0) {
					while($row_reporter_location = mysqli_fetch_array($query_reporter_location)){
						$reporter_location = $row_reporter_location['reporter_location'];
						echo '<option value="'.$reporter_location.'">'.$reporter_location.'</option>';
					}
				}
			}
		}else{
			echo '<option value="None" selected>None</option>';
			$sql_reporter_location = "SELECT * FROM tbl_reporter_location";
			$query_reporter_location = mysqli_query($conn,$sql_reporter_location);
			if (mysqli_num_rows($query_reporter_location) > 0) {
				while($row_reporter_location = mysqli_fetch_array($query_reporter_location)){
					$reporter_location = $row_reporter_location['reporter_location'];
					echo '<option value="'.$reporter_location.'">'.$reporter_location.'</option>';
				}
			}
		}
	}
	function AddHeadline($array){
		include('conn.php');
		if ($array[1] == "") {
			echo '<span class="badge bg-danger">Please input Headline!</span>';
		}else{
		$program = $array[0];
		$headline = trim(preg_replace('/\s\s+/', ' ', str_replace("'","''",$array[1])));
		$reporterID = $array[2];
		$location = $array[3];
		$sqlSelReporter = "SELECT * FROM tbl_reporter WHERE id = '$reporterID' LIMIT 1";
		$querySelReporter = mysqli_query($conn,$sqlSelReporter);
		while ($row = mysqli_fetch_array($querySelReporter)) {
			$reporter = $row['reporter'];
		}
		$sql = "INSERT INTO `tbl_on_the_spot_headline` (`id`, `program_name`, `headline`, `reporter`, `reporter_location`) VALUES (NULL,'$program','$headline','$reporter','$location')";
			mysqli_query($conn,$sql);
			echo '<span class="badge bg-success">Sucessfully Added!</span>';
		}
	}
	function AddProgram($program){
		include('conn.php');
		$headline = trim(preg_replace('/\s\s+/', ' ', str_replace("'","''",$array[1])));
		$reporterID = $array[2];
		$location = $array[3];
		$sqlSelReporter = "SELECT * FROM tbl_reporter WHERE id = '$reporterID' LIMIT 1";
		$querySelReporter = mysqli_query($conn,$sqlSelReporter);
		while ($row = mysqli_fetch_array($querySelReporter)) {
			$reporter = $row['reporter'];
		}
		$sql = "INSERT INTO `tbl_on_the_spot_headline` (`id`, `program_name`, `headline`, `reporter`, `reporter_location`) VALUES (NULL,'$program','$headline','$reporter','$location')";
		if ($headline = '') {
			echo '<span class="badge bg-danger">'.$headline.'</span>';
		}else{
			mysqli_query($conn,$sql);
			echo '<span class="badge bg-success">Sucessfully Added!</span>';
		}
	}
	function RemoveHeadline($id){
		include('conn.php');
		$sql = "DELETE FROM tbl_on_the_spot_headline WHERE id = '$id'";
		if ($id == '') {
			echo '<span class="badge bg-warning" style="float:right;">Error Deleting!</span>';
		}else{
			echo '<span class="badge bg-info" style="float:right;">Removed!</span>';
			mysqli_query($conn,$sql);
		}
	}
	function timeAgo($timestamp){
	    $datetime1=new DateTime("now");
	    $datetime2=date_create($timestamp);
	    $diff=date_diff($datetime1, $datetime2);
	    $timemsg='';
	    if($diff->y > 0){
	        $timemsg = $diff->y .' year'. ($diff->y > 1?"'s":'');
	    }
	    else if($diff->m > 0){
	     	$timemsg = $diff->m . ' month'. ($diff->m > 1?"'s":'');
	    }
	    else if($diff->d > 0){
	     	$timemsg = $diff->d .' day'. ($diff->d > 1?"'s":'');
	    }
	    else if($diff->h > 0){
	     	$timemsg = $diff->h .' hour'.($diff->h > 1 ? "'s":'');
	    }
	    else if($diff->i > 0){
	     	$timemsg = $diff->i .' minute'. ($diff->i > 1?"'s":'');
	    }
	    else if($diff->s > 0){
	     	$timemsg = $diff->s .' second'. ($diff->s > 1?"'s":'');
	    }
		$timemsg = $timemsg.' ago';
		return $timemsg;
	}
	function edit_Headline($array){
		include('conn.php');
		$edited_id = $array[0];
		$edited_program = $array[1];
		$edited_headline = $array[2];
		$edited_reporter = $array[3];
		$edited_location = $array[4];
		$trim_edited_headline = trim(preg_replace('/\s\s+/', ' ', str_replace("'","''",$edited_headline)));
		$sql_Update = "UPDATE `tbl_on_the_spot_headline` SET `headline` = '$edited_headline',`reporter`='$edited_reporter',`reporter_location` = '$edited_location', `program_name` = '$edited_program' WHERE `id` = '$edited_id'";
		mysqli_query($conn,$sql_Update);
		echo "Saved!";
	}
	function countHeadlines(){
		include('conn.php');
		$sql = "SELECT * FROM tbl_on_the_spot_headline";
		$query = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($query);
		echo $rows;
	}
	function new_program($headline){
		include('conn.php');
		$sql_new_program = "INSERT INTO `tbl_programs` (`id`,`program_name`) VALUES (null,'$headline')";
		mysqli_query($conn,$sql_new_program);
		echo "Added!";
	}
	function new_location($location){
		include('conn.php');
		$sql_new_location = "INSERT INTO `tbl_reporter_location` (`id`,`reporter_location`) VALUES (null,'$location')";
		mysqli_query($conn,$sql_new_location);
		echo "Added!";
	}
	function new_reporter($array){
		include('conn.php');
		$new_reporter = $array[0];
		$new_location = $array[1];
		$sql_new_reporter = "INSERT INTO `tbl_reporter` (`id`,`reporter`,`default_location`) VALUES (null,'$new_reporter','$new_location')";
		mysqli_query($conn,$sql_new_reporter);
		echo "Added!";
	}
	if (isset($_POST['keyword'])) {
		$keyword = $_POST['keyword'];
		SearchHeadline($keyword);
	}
	if (isset($_POST['headline'])) {
		DisplayHeadline();
	}
	if (isset($_POST['reporter'])) {
		DisplayReporter();
	}
	if (isset($_POST['reporterID'])) {
		$reporterid = $_POST['reporterID'];
		DisplayReporterDefaultLocation($reporterid);
	}
	if (isset($_POST['AddHeadline'])) {
		$program = $_POST['AddProgram'];
		$headline = $_POST['AddHeadline'];
		$reporter = $_POST['AddReporter'];
		$location = $_POST['AddLocation'];
		$arrayData = array($program,$headline,$reporter,$location);
		AddHeadline($arrayData);
	}
	if (isset($_POST['headlineID'])) {
		$headlineID = $_POST['headlineID'];
		RemoveHeadline($headlineID);
	}
	if (isset($_POST['countHeadlines'])) {
		countHeadlines();
	}
	if (isset($_POST['edited_headline'])) {
		$edited_id = $_POST['edited_id'];
		$edited_program = $_POST['edited_program'];
		$edited_headline = $_POST['edited_headline'];
		$edited_reporter = $_POST['edited_reporter'];
		$edited_location = $_POST['edited_location'];
		$edited_array = array($edited_id,$edited_program,$edited_headline,$edited_reporter,$edited_location);
		edit_Headline($edited_array);
	}
	if (isset($_POST['new_program'])) {
		$new_program = $_POST['new_program'];
		new_program($new_program);
	}
	if (isset($_POST['new_location'])) {
		$new_location = $_POST['new_location'];
		new_location($new_location);
	}
	if (isset($_POST['new_reporter'])) {
		$new_reporter = $_POST['new_reporter'];
		$new_reporter_location = $_POST['new_reporter_location'];
		$array = array($new_reporter,$new_reporter_location);
		new_reporter($array);
	}
	if (isset($_POST['program'])) {
		display_Program();
	}
?>
