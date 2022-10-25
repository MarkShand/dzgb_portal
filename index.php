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
	<title>DZGB Portal</title>
	<?php include('head.php');?>
</head>
<body>
	<?php include('nav.php');?>
	</nav>
	<div class="container mb-4" id="container">
		<div class="row mt-3">
			<div class="col-lg-8 col-md-6">
				<div class="form-group">
		      		<textarea class="form-control" id="content" placeholder="Add Headline" rows="2"></textarea>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="form-group">
					<label class="form-label">Span</label>
					<select class="form-control" id="SpanLocNat">
						<option value="national">National</option>
						<option value="local">Local</option>
						<option value="local">Standby</option>
						<option value="local">Crawl</option>
					</select>
				</div>
			</div>
			<div class="form-group mt-2">
				<button type="submit" id="add" class="btn btn-outline-info btn-sm">Add</button>
				<button type="submit" onclick="DisplayTable();" id="refresh" hidden class="btn btn-outline-warning btn-sm ">Refresh</button>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-lg-12">
				<ul class="nav nav-tabs">
				  	<li class="nav-item">
				    	<a class="nav-link active" data-bs-toggle="tab" href="#local">Local</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link " data-bs-toggle="tab" href="#national">National</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link " data-bs-toggle="tab" href="#standby">Standby</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link " data-bs-toggle="tab" href="#crawl">Crawl Only</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link " data-bs-toggle="tab" href="#deleted">Deleted</a>
				  	</li>
				  
				</ul>
				<div id="myTabContent" class="tab-content">
				  	<div class="tab-pane fade active show" id="local">
				    	<div class="row">
							<div class="col-xs-12 " id="display_local"></div>
						</div>
				  	</div>
				  	<div class="tab-pane fade" id="national">
				    	<div class="row">
							<div class="col-xs-12 " id="display_national"></div>
						</div>
				  	</div>
				  	<div class="tab-pane fade" id="standby">
				    	<div class="row">
							<div class="col-xs-12 " id="display_standby"></div>
						</div>
				  	</div>
				  	<div class="tab-pane fade" id="crawl">
				    	<div class="row">
							<div class="col-xs-12 " id="display_crawl"></div>
						</div>
				  	</div>
				  	<div class="tab-pane fade" id="deleted">
				    	<div class="row">
							<div class="col-xs-12 " id="display_deleted"></div>
						</div>
				  	</div>

				</div>
			</div>
		</div>
	</div>
</body>
<?php include('footer.php'); ?>
<script type="text/javascript">
	CallFunctions();
</script>
</html>