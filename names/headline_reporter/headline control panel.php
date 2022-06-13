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
	<body style="zoom: 0.7;">
		<div id="badge" class="position-right sticky-top-right"></div>
		<div id="badge2" class="position-right sticky-top-right"></div>
		<div class="container">
			<section class="row mt-2">
				<h4>Headline</h4>
				<div class="col-6" id="top">
					<div class="btn-group">
						<input class="form-control" id="search-headline" placeholder="Search Headline.." title="Search Headline" onkeyup="FilterHeadline();">
						<button class="btn btn-outline-warning" onclick="clearSearch()">Clear</button>
					</div>
				</div>
				<div class="col-6">
					<div class="btn-group">
						<button class="btn btn-outline-success" onclick="sendHeadlinedata('animateIn');">Show</button>
						<button class="btn btn-outline-warning" onclick="sendAnimationOut('animateOut','Hide');">Hide</button>
						<a href="#addHeadline" class="btn btn-outline-info" data-toggle="collapse" onclick="DisplayLocation();">New</a>
						<button  class="btn btn-outline-primary" onclick="Click();">Refresh</button>	
					</div>
				</div>
			</section>
			<div class="row">
			  	<div id="addHeadline" class="collapse">
			  		<div class="card border-info mt-3">
						<div class="card-header">Add Headline</div>
					  	<div class="card-body">
				    		<div class="row mt-3">
					    		<div class="col-xs-12 col-sm-6">
									<label for="SelectProgram" class="form-label">Select Program</label>
							    	<div class="input-group">
								      	<select required class="form-control" id="SelectProgram"></select>
								      	<button  onclick="New_Program()" class="btn btn-outline-primary">New</button>
								    </div>
					    		</div>
							    <div class="col-xs-12 col-sm-6">
								    <label for="addHeadline" class="form-label">Add New Headline</label>
							    	<div class="form-group">
								      	<textarea required class="form-control" id="addHeadline" rows="2"></textarea>
								    </div>
							    </div>
							</div>
					    	<div class="row mt-3">
					    		<div class="col-xs-12 col-sm-6">
							    	<label>Reporter</label> 
							    	<div class="input-group">
							    		<select required class="form-control" id="reporter" onchange="DisplayLocation();">
							    		</select>
							    		<button class="btn btn-outline-primary" onclick="new_Reporter()">New</button>
							    	</div>
					    		</div>
					    		<div class="col-xs-12 col-sm-6">
							    		<label>Location</label>
							    	<div class="input-group">
							    		<select required class="form-control" id="reporter-location" onload="DisplayLocation();"></select>
							    		<button class="btn btn-outline-primary" onclick="new_location()">New</button>
							    	</div>
					    		</div>
					    	</div> 
						    <div id="addReporter" class="collapse">
						    	<div class="card border-info mt-3">
								  	<div class="card-header">Add Reporter</div>
								  	<div class="card-body">
								    	<div class="row">
							    			<div class="col-xs-12 col-sm-6">
												<div class="form-group">
												  	<div class="form-floating mb-3">
												    	<input type="text" class="form-control" id="NewReporter" placeholder="Reporter Name">
												    	<label for="NewReporter">Add Reporter</label>
												  	</div>
												</div>
							    			</div>
							    			<div class="col-xs-12 col-sm-6">
							    			 	<div class="form-group">
												  	<div class="form-floating">
												    	<input type="text" class="form-control" id="NewReporterLocation" placeholder="Default Location">
												    	<label for="NewReporterLocation">Add Location</label>
												  	</div>
												</div>
							    			</div>
							    		</div>
								  	</div>
								  	<div class="card-footer">
								  		<button class="btn btn-outline-success btn-sm position-right">Add Reporter</button>
								  	</div>
								</div>
					    	</div>
					    	<div id="NewProgram" class="collapse">
						    	<div class="card border-info mt-3">
								  	<div class="card-header">Add Program</div>
								  	<div class="card-body">
								    	<div class="row">
							    			<div class="col-xs-12 col-sm-6">
							    			 	<div class="form-group">
												  	<div class="form-floating mb-3">
												    	<input type="text" class="form-control" id="AddNewProgram" placeholder="Reporter Name">
												    	<label for="AddNewProgram">Add Program</label>
												  	</div>
												</div>
							    			</div>
							    		</div>
								  	</div>
								  	<div class="card-footer">
								  		<button class="btn btn-outline-success btn-sm position-right">Add Program</button>
								  	</div>
								</div>
					    	</div>
					    </div>
						<div class="card-footer">
						  	<button class="btn btn-outline-success btn-sm position-right" onclick="AddHeadline();" >Add Headline</button>
						</div> 
					</div>
				</div>	
			</div>
		  	<div class="radio-position" style="display: none;">
		        <input type="radio" name="radio-group-position" id="position-left" checked="checked"/><label for="position-left">Left</label>
		        <input type="radio" name="radio-group-position" id="position-right" /><label for="position-right">Right</label>
		   	</div>
			<div class="row mt-4">
				<div class="col-6">
					<h4>Headline List</h4>

				</div>
				<div class="col-6">
					<div class="form-check form-switch">
				    	<input class="form-check-input" type="checkbox" id="autoShowSwitch" checked>
						<label class="form-check-label" for="autoShowSwitch">Auto Show</label>
				    </div>
					
				</div>
			</div>
			<div class="row mt-3">		
				<ul id="predefined" class="list-group"></ul>
			</div>
			<div class="row mt-3" style="display:none;">
				<div class="label">Output:</div>
				<input disabled class="form-control" id="lower-thirds-actual-count" placeholder="Actual Count">
				<input disabled class="form-control" id="lower-thirds-new-count" placeholder="New Count">		
				<input disabled class="form-control" id="lower-thirds-program" placeholder="Program">		
				<input disabled class="form-control" id="lower-thirds-reporter" placeholder="Reporter">
				<input disabled class="form-control" id="lower-thirds-headline" placeholder="Headline">
				<input disabled class="form-control" id="lower-thirds-location" placeholder="Location">
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
	<script type="text/javascript">
		CallFunctions();
		NewCountHeadlines();
	</script>
</html>