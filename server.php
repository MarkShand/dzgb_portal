<?php
include('conn.php');
$sql = "SELECT * FROM `tbl_headlines` WHERE `label` = 'existing' ORDER BY `id` DESC";
$query = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DZGB Portal Server</title>
	<?php include('head.php');?>
</head>
<body>
	<?php include('nav.php');?>
	</nav>
	<div class="container mb-4" id="container">
		<div class="row mt-3">
			<div class="col-lg-12">
				<ul class="nav nav-tabs">
				  	<li class="nav-item">
				    	<a class="nav-link " data-bs-toggle="tab" href="#headline">Server</a>
				  	</li>
				</ul>
				<div id="myTabContent" class="tab-content">
				  	<div class="tab-pane fade active show" id="headline">
				    	<div class="row">
							<div class="row mt-3">
								<div class="col-xs-12">
									<h4>Start | Stop Headlines</h4>
								</div>
							</div>
							<div class="row mt-3">
								<div class="form-group">
									<div class="row mt-3">
										<div class="col-xs-12">
											<button class="btn btn-outline-info" id="start" disabled onclick="Start();">Start Headline</button>
											<button class="btn btn-outline-warning" id="stop" onclick="Stop();">Stop</button>
											<?php
												echo "
													<button class=\"btn btn-outline-warning\" id=\"server\"  onclick=\"UpdateServer('".$ip."');\">Set Server</button>
												"; ?>
											<div id="display_status"></div>
										</div>
									</div>
									<div id="NewInput" >
										<?php
											$sql2 = "SELECT * FROM `tbl_headlines` WHERE `label` = 'existing' ORDER BY `id`, `label` DESC";
											$query2 = mysqli_query($conn,$sql2);
									  		if (mysqli_num_rows($query2) > 0) {
										  		$numrows = mysqli_num_rows($query2);
										  		echo "
										  			<div class=\"input-group\">
														<input class=\"form-control\" style=\"visibility:hidden;\" type=\"text\" style=\"visibility:visible;\" id=\"inputNum\" value=\"".$numrows."\">
										  			</div>
										  		";
									  		}else{
									  			echo "
										  			<div class=\"input-group\">
														<input class=\"form-control \" style=\"visibility:hidden;\" type=\"text\" style=\"visibility:visible;\" id=\"inputNum\" value=\"1\">
										  			</div>
										  		";
									  		}
								  		?>
									<textarea class="form-control" id="newValue" style="visibility:hidden;"  disabled rows="4"></textarea>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php include('footer.php'); ?>
<script type="text/javascript">
	

    StartHeadline();
    function CallFunctions() {
	DisplayStatus();
    MonitorStatus();
    DisplayPCServerStatus();
    window.setTimeout(CallFunctions, 1000);
}
CallFunctions();
</script>
</html>