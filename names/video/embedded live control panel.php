<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	    <title>OTP Headlines</title>
		<link rel="stylesheet" href="../common/css/flatly-bootstrap.min.css">
		<link rel="stylesheet" href="../common/css/swal2-dark.css">
		<link rel="stylesheet" href="../common/css/open iconic/css/open-iconic-bootstrap.css">
  	</head>
	<style type="text/css">
	  	.img{
	  		display: none;
	  	}.text-decoration-none{
	  		text-decoration: none;
	  	}.white{
			color: white;
		}.hide{

			display: none;
		}.show{
			display: inline;
		}.position-right{
			float: right;
			z-index: 199;
		}.position-left{
			float: left;
		}.sticky-top-right{
			top: 10px;
			right: 10px;
			position: sticky;
		}
		.position-bottom-right-sticky{
			bottom: 20px;
			float: right;
			right: 20px;
			position: sticky;
			z-index: 200;
		}
	</style>
	<body style="zoom: 0.6;">
		<div id="badge" class="position-right sticky-top-right"></div>
		<div id="badge2" class="position-right sticky-top-right"></div>
		<div class="container">
			<section class="row mt-2">
				<h4>Live URL Source</h4>
				<div class="col-6">
					<div class="btn-group">
						<button class="btn btn-outline-success" onclick="send_url();">Show</button>
						<button class="btn btn-outline-warning" onclick="sendAnimationOut('animateOut','Hide');">Hide</button>
						<a href="#addHeadline" class="btn btn-outline-info" data-toggle="collapse" onclick="DisplayLocation();">New</a>
						<button  class="btn btn-outline-primary" onclick="location.reload()">Refresh</button>
					</div>
				</div>
			</section>
			<div class="row">
			  	<div id="addHeadline">
			  		<div class="card border-info mt-3">
						<div class="card-header">Live URL Input</div>
					  	<div class="card-body">
				    		<div class="row mt-3">
							    <div class="col-xs-12">
								    <label for="url" class="form-label">URL</label>
							    	<div class="form-group">
								      	<input type="text" class="form-control" id="url_id"></textarea>
								    </div>
							    </div>
							</div>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<div class="position-bottom-right-sticky">
			<a href="#top" class="btn btn-success">
				<span class="oi oi-chevron-top"></span>
			</a>
		</div>
  	</body>
	<script type="text/javascript" src="../common/js/script.js"></script>
	<script type="text/javascript" src="../common/js/jquery.js"></script>
	<script type="text/javascript" src="../common/js/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="../common/js/popper.min.js"></script>
	<script type="text/javascript" src="../common/js/bootstrap.bundle.min.js"></script>
</html>
