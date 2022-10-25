<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	#content{
		font-family: ARIAL BLACK;
		text-transform: uppercase;
		font-size: 25px;
		margin: auto;
		position:relative;
		color: white;
	}
	.inline{
		display: inline-block;
	}
	.image{
		padding-right:30px;
		padding-left:30px;
		transform: translateY(10%);
		display:inline-block;
		height:23px;
	}
<?php

	function DisplayCrawl($label,$span,$title){
		include('conn.php');
		
		$sqlSelect = "SELECT `content` FROM `tbl_headlines` WHERE `label` = '$label' AND `span` = '$span' ORDER BY `id` DESC";
		$querySelect = mysqli_query($conn,$sqlSelect);
		if (mysqli_num_rows($querySelect) > 0) {
			echo "<div class=\"inline\">".strtoupper($title)."</div>";
			while($row = mysqli_fetch_array($querySelect)){
				echo "<div class=\"inline\">".$row['content']."</div><img style=\"padding-right:30px; padding-left:30px; transform: translateY(10%); display:inline-block; height:23px;\" src=\"img/DZGB.png\">";
			}
		}
	}
?>
</style>
	<body>
		<marquee scrollamount="15">
			<div id="id">
				<div id="content">
					<?php
					DisplayCrawl('existing','Crawl','');
					DisplayCrawl('existing','National','');
					DisplayCrawl('existing','Local','Local');
					?>
					<div class="inline">
						 Tune in to DZGB-am 729 kHz for more details <img style='padding-right:30px; padding-left:30px; transform: translateY(11%); display:inline-block; height:25px;' src='img/fb.png'> follow our facebook page DZGBNewsOnline for more updates <img style='padding-right:30px; padding-left:30px; transform: translateY(11%); display:inline-block; height:25px;' src='img/fb.png'> Always Wear Mask, Maintain Social Distancing, Proper Handwashing
					</div>
				</div>
			</div>
		</marquee>
	</body>
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
			      $("#id").load(window.location.href + " #id" );
			}, 3000);
		});
	</script>
</html>