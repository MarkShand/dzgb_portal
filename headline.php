<div class="row mt-3">
	<div class="col-xs-12">
		<h4>Start | Stop Headlines</h4>
	</div>
</div>
<div class="row mt-3">
	<div class="form-group">
		<textarea class="form-control" id="newValue" disabled rows="4"></textarea>
		<div class="row mt-3">
			<div class="col-xs-12">
				<button class="btn btn-outline-info" id="start" disabled onclick="Start();">Start Headline</button>
				<button class="btn btn-outline-warning" id="stop" onclick="Stop();">Stop</button>
				<input class="form-control" type="text" id="timer" value="1">
			</div>
		</div>
		<div id="NewInput">
			<?php
			$sql2 = "SELECT * FROM `tbl_headlines` WHERE `label` = 'existing'";
			$query2 = mysqli_query($conn,$sql2);
	  		if (mysqli_num_rows($query2) > 0) {
		  		$numrows = mysqli_num_rows($query2);
		  		echo "
		  			<div class=\"input-group\">
							<input class=\"form-control\" type=\"text\" id=\"inputNum\" value=\"".$numrows."\">
		  			</div>
		  		";
	  		}else{
	  			echo "
		  			<div class=\"input-group\">
							<input class=\"form-control \"   type=\"text\" id=\"inputNum\" value=\"1\">
		  			</div>
		  		";
	  		}
	  		?>
		</div>
	</div>
</div>