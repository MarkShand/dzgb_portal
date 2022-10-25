<?php include('conn.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta charset="utf-8">
		<title>Standby</title>
		<link rel="stylesheet" href="css/darkly.css">
		<link rel="stylesheet" href="css/icons/bootstrap-icons.css">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	</head>
	<style media="screen">
		.floating-btn{
			position: fixed;
			bottom: 10px;
			right: 15px;
		}li{
			cursor:grab;
		}
	</style>
	<body style="zoom:0.7;">
		<div class="container">
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6"></div>
			</div>
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6"></div>
			</div>
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6"></div>
			</div>
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6"></div>
			</div>
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6"></div>
			</div>
		</div>
		<div class="container">
			<div class="row">

				<div class="col">
					<div class="row">
						<div class="d-flex pt-3 justify-content-between flex-wrap">
							<div class="p-1 align-self-center">
								<button class="btn btn-sm btn-outline-light mx-2" id="reset">
									<i class="bi bi-arrow-clockwise"></i>
								</button>
								<button class="btn btn-sm btn-outline-light" id="add">
									<i class="bi bi-plus"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="row my-3">
						<div class="col-md-12">
							<input id="search-bar" class="form-control" placeholder="Search Here">
						</div>
					</div>
					<div class="row" id="search-result">
						<?php
							$sql = 'SELECT * FROM tbl_standby';
							$query = mysqli_query($conn,$sql);
							while ($row = mysqli_fetch_array($query)) {
								$id = $row['id'];
								$name = $row['name'];
								echo '
									<div class="col-md-12 my-1">
										<div class="card bg-dark border-primary btn btn-dark p-1" style="text-align:left;">
											<div class="card-header m-0" onclick="itemClick(this);" data-name="'.$name.'" id="standby-item">
												<h5 class="m-0">'.$name.'</h5>
											</div>
											<div class="card-body p-1 d-flex justify-content-end">
												<button class="btn mt-1 btn-sm btn-outline-info" onclick="edit(me)" item-name="'.$name.'" item-id="'.$id.'">
													<i class="bi bi-pen-fill"></i>
												</button>
												<button class="btn mx-2 mt-1 btn-sm btn-outline-danger" item-id="'.$id.'" onclick="remove(this)">
													<i class="bi bi-trash-fill"></i>
												</button>
											</div>
										</div>
									</div>
								';
							}
						?>
					</div>
				</div>
				<div class="col">
					<h3 class="mt-2 align-self-center" id="indicator-name">Standby</h3>
					<ul class="mt-2 m-0" id="items" style="padding: 0; list-style:none;"></ul>
				</div>
			</div>
		</div>
		<input type="hidden" id="" value="">
	</body>
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//BUTTON FOR REMOVING EACH ADDED ITEM
			$(document).on('click', 'button#remove-standby', function(){
				channel = $(this).attr('data-key');
				tx = new BroadcastChannel('remove-channel');
				tx.postMessage(channel);
			});

			// ON ITEM REMOVAL AND UPDATING OF CLIENT SIDE LIST
			rx_del = new BroadcastChannel('remove-channel');
			rx_del.onmessage =  function(ev){
				rx_del_data = ev.data.split('|');
				item = rx_del_data[0];
				$('#' + item).remove();

				//RESEND ITEMS TO STANDBY
				list = $('#items').children();
				childrens = list;
				list_id = [];
				list_key = [];
				$('#items').children().each(function(index) {
				  list_id.push($(this).attr('item-name'));
				  list_key.push($(this).attr('id'));
				});
				tx_update_list = new BroadcastChannel('update-list');
				tx_update_list.postMessage(list_id + '|' + list_key);
			}

			// DOCUMENT ONLOAD RESET ALL INCLUDING THE CLIENT SIDE
			reset = new BroadcastChannel('reset');
			reset.postMessage('reset');

			// RESET PANEL SIDE ON CLIENT SIDE REFRESH
			reset_panel = new BroadcastChannel('reset-panel');
			reset_panel.onmessage = function(ev){
				$("#items").html('');
			};

			// RESET BUTTON TO RESET PANEL AND CLIENT SIDE
			$('#reset').on('click', function(){
				reset = new BroadcastChannel('reset');
				reset.postMessage('reset');
				$("#items").html('');
				$('#search-bar').val('');
				$("#search-result").load(window.location.href + " #search-result");
			});

			//ON USER SEARCH
			$('#search-bar').on('paste, keyup', function(){
				query = $('#search-bar').val();
				$.ajax({
					method: 'post',
					url: 'post.php',
					data: {
						'search': 1,
						'query': query
					},
					success:function(data){
						$('#search-result').html(data);
					}
				});
			});

			// ON ITEM SORT, UPDATE LIST ON CLIENT SIDE
			$('#items').sortable({
				placeholder: 'ui-state-highlight',
				helper: 'clone',
				revert: 'invalid',
				/*placeholder: 'ui-sortable-placeholder',*/
				start: function(e, ui){
					ui.placeholder.height(ui.item.height());
					ui.placeholder.css('visibility', 'visible');
				},
				helper:'clone',
				stop: function(ev,ui) {
					list = $(this).children();
					childrens = list;
					list_id = [];
					list_key = [];
					$(this).children().each(function(index) {
						list_id.push($(this).attr('item-name'));
						list_key.push($(this).attr('id'));
					});
					tx_update_list = new BroadcastChannel('update-list');
					tx_update_list.postMessage(list_id + '|' + list_key);
				}
			});

			// DISPLAY BROADCASTED NAME TO PANEL SIDE
			rx = new BroadcastChannel('standby-channel');
			rx.onmessage =  function(ev){
				rx_data = ev.data.split('|');
				var name = rx_data[0];
				var rand = rx_data[1];
				name_nospace = name.replace(/\s+/g, '');
				$('#items').append(
				 '<li class="my-0 mb-2" item-name="'+name+'" id="'+name_nospace+''+rand+'">'
				+ '	<div class="card bg-dark border-primary p-1" style="text-align:left;">'
				+ '		<div class="d-flex justify-content-between flex-wrap">'
				+ '			<div class="p-1 py-2">'
				+ '				<b class="display-7">'+ name +'</b>'
				+ '			</div>'
				+ '			<div class="p-1">'
				+ '				<button type="button" class="btn btn-sm btn-outline-danger" id="remove-standby" data-key="'+name_nospace+''+rand+'">'
				+ '					<i class="bi bi-x-lg"></i>'
				+ '				</button>'
				+ '			</div>'
				+ '		</div>'
				+ '	</div>'
				+ '</li>'
					);
				}

				// BUTTON FOR ADDING NEW ITEM
				$('#add').on('click',function(){
					Swal.fire({
						title: 'Add New',
						input: 'text',
						inputPlaceholder: 'Type here',
						showCancelButton: true,
						inputValidator: (value) => {
							if (!value) {
								return 'You need to write something!'
							}else {
								$.ajax({
									method: 'post',
									url: 'post.php',
									data: {
										'add_name': 1,
										'add_new_name': value
									},
									success:function(data){
										Swal.fire('Added!', '', 'success');
										$("#search-result").load(window.location.href + " #search-result");
									}
								});
							}
						}
					});
				});
			});
	</script>
</html>
