<?php
	include('conn.php');
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$sql = "SELECT * FROM `tbl_on_the_spot_headline` WHERE `id` = '$id'";
		$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$headline = $row['headline'];
				$reporter = $row['reporter'];
				$location = $row['reporter_location'];
				$program_name = $row['program_name'];
				
				$sql_select_reporter = "SELECT * FROM tbl_reporter WHERE NOT `reporter` = '$reporter'";
				$query_select_reporter = mysqli_query($conn,$sql_select_reporter);

				$sql_select_program = "SELECT * FROM tbl_programs WHERE NOT `program_name` = '$program_name'";
				$query_select_program = mysqli_query($conn,$sql_select_program);

				$sql_select_location = "SELECT * FROM tbl_reporter_location WHERE NOT `reporter_location` = '$location'";
				$query_select_location = mysqli_query($conn,$sql_select_location);
				
				echo '
      				<div class="form-group">
      					<label class="form-label position-left">Headline</label>
      					<textarea class="form-control" id="edited_headline" placeholder="Edit Headline" rows="3">'.$headline.'</textarea>
      				</div>
					<div class="form-group mt-3">
					<label class="form-label position-left">Program</label>
						<select class="form-control" required id="edited_program">
							<option	selected value="'.$program_name.'">'.$program_name.'</option>';
							while ($row_sel_program = mysqli_fetch_array($query_select_program)) {
								$list_program = $row_sel_program['program_name'];
								echo '<option value="'.$list_program.'">'.$list_program.'</option>';
							}
							echo '
						</select>
					</div>
					<div class="form-group mt-3">
						<label class="form-label position-left">Reporter</label>
						<select class="form-control" required id="edited_reporter">
							<option	selected value="'.$reporter.'">'.$reporter.'</option>';
							while ($row_sel_reporter = mysqli_fetch_array($query_select_reporter)) {
								$list_reporter = $row_sel_reporter['reporter'];
								echo '<option value="'.$list_reporter.'">'.$list_reporter.'</option>';
							}
							echo '
						</select>
					</div>
					<div class="form-group mt-3" style="display:none;">
						<label class="form-label position-left">Location</label>
						<select class="form-control" required id="edited_location">
							<option	selected value="'.$location.'">'.$location.'</option>';
							while ($row_sel_location = mysqli_fetch_array($query_select_location)) {
								$list_location = $row_sel_location['reporter_locations'];
								echo '<option value="'.$list_location.'">'.$list_location.'</option>';
							}
							echo '
						</select>
					</div>
					<input id="edited_id" type="text" value="'.$id.'" style="display:none;">
			    ';
			}
		}
	}
?>