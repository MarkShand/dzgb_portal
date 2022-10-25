<?php
	include('conn.php');
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$sql = "SELECT * FROM `tbl_headlines` WHERE `id` = '$id'";
		$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$content = $row['content'];
				$span = $row['span'];
				$selected = "selected";
				echo "
					<div class=\"col-md-12\">
		      			<textarea class=\"form-control\" id=\"content2\" placeholder=\"Edit Headline\" rows=\"4\">".$content."</textarea>
			    	</div>
		    		<div class=\"form-group\">'
			      		<select class=\"form-select\" id=\"NationalLocal\">   		
			        		";	
			        			if($span == 'National') {
			        				echo 
			        				"<option ".$selected.">National</option>
			        				<option>Local</option>
			        				<option>Standby</option>
			        				<option>Crawl</option>";
			        			}if ($span == 'Local') {
			        				echo 
			        				"<option >National</option>
			        				<option ".$selected.">Local</option>
			        				<option>Standby</option>
			        				<option>Crawl</option>";
			        			}if ($span == 'Standby') {
			        				echo 
			        				"<option >National</option>
			        				<option>Local</option>
			        				<option ".$selected.">Standby</option>
			        				<option>Crawl</option>";
			        			}if ($span == 'Crawl') {
			        				echo 
			        				"<option >National</option>
			        				<option>Local</option>
			        				<option>Standby</option>
			        				<option ".$selected.">Crawl</option>";
			        			}

			        		echo"
			      		</select>
			    	</div>
					<input id=\"headlineID\" type=\"text\" value=\"".$id."\" style=\"display:none;\">
			    ";
			}
		}
	}
?>