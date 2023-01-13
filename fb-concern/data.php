<?php
if (isset($_POST['count'])) {
  include('conn.php');
  $sql = "SELECT * FROM tbl_concerns WHERE `resolved` = '0'";
  $query = mysqli_query($conn, $sql);

  $rowCount = mysqli_num_rows($query);
  echo $rowCount;
}
if(isset($_POST['resolve'])){
    include('conn.php');
    $id = $_POST['id'];
    $sql = "UPDATE `tbl_concerns` SET `resolved` = '1' WHERE `id` = '$id'";
    if (mysqlI_query($conn,$sql)) {
        echo 'ok';
    }
}
if (isset($_POST['countEdit'])) {
    include('conn.php');
    $sql = "SELECT * FROM tbl_edit_concern";
    $query = mysqli_query($conn, $sql);
  
    $rowCount = mysqli_num_rows($query);
    echo $rowCount;
  }
if (isset($_POST['editConcern'])) {
    include('conn.php');
    $concern = $_POST['textEdit'];
    $id = $_POST['id'];
    $sql = "UPDATE `tbl_concerns` SET `concern` = '$concern' WHERE `id` = '$id'";
    $sqlAddConcern = "INSERT INTO `tbl_edit_concern`(`edit_concern`) VALUES('$id')";
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sqlAddConcern);
    echo 'ok';
}
?>