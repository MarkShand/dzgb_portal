<?php
	if (isset($_POST['search'])) {
		include('conn.php');
		$keyword = $_POST['query'];
		$sql = "SELECT * FROM tbl_standby WHERE `name` LIKE '%$keyword%' ORDER BY `name` DESC";
		$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$name = $row['name'];
				echo '
				<div class="col-md-12 my-1">
					<div class="card bg-dark border-primary btn btn-dark p-1" onclick="itemClick(this);" data-name="'.$name.'" id="standby-item" style="text-align:left;">
						<div class="d-flex justify-content-between flex-wrap">
							<div class="p-1 py-2">
								<b class="display-7">'.$name.'</b>
							</div>
							<div class="p-1">
								<button class="btn btn-sm btn-outline-danger" id="remove">
									<i class="bi bi-trash-fill"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
				';
			}
		}else {
			echo '
				<div class="col-md-12 my-1">
					<div class="card bg-dark border-primary btn btn-dark" id="no-item">
						<div class="card-body p-1 py-2">
							<b class="display-7">No Record Found</b>
						</div>
						<div class="p-1">
							<button class="btn btn-lg btn-block btn-outline-info" id="show-hide">
								<i class="bi bi-plus-square-fill"></i> &nbsp; Add
							</button>
						</div>
					</div>
				</div>
			';
		}
	}
	if (isset($_POST['add_name'])) {
		include('conn.php');
		$new_name = $_POST['add_new_name'];
		$sql = "INSERT INTO `tbl_standby` (`id`,`name`) VALUES (NULL,'$new_name')";
		mysqli_query($conn,$sql);
	}
	if (isset($_POST['edit'])) {
		include('conn.php');
		$id = $_POST['edit-id'];
		$name = $_POST['edit-name'];
		$sql = "UPDATE `tbl_standby` SET `name` = '$name' WHERE `id` = '$id'";
		mysqli_query($conn,$sql);
	}
	if (isset($_POST['delete'])) {
		include('conn.php');
		$id = $_POST['delete-id'];
		$sql = "DELETE FROM tbl_standby WHERE id = '$id'";
		mysqli_query($conn,$sql);
	}
?>
