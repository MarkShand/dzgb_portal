<?php
if (isset($_POST['concern'])) {
  include('conn.php');
  $text = $_POST['text'];
  $sql = "INSERT INTO `tbl_concerns`(`concern`) VALUES('$text')";
  if (mysqli_query($conn, $sql)) {
    echo 'ok';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Concerns</title>
  <link rel="stylesheet" href="../css/flatly.css" crossorigin="anonymous">
</head>
<style >
  body{
    margin-bottom:5rem;
  }
  * {
    transition: 0.7s;
  }

  .floating-btn {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    z-index: 100 !important;
  }

  .floating-control-container {
    position: absolute;
    width: 100%;
    height: 100%;

  }

  .floating-control {
    position: relative;
    width: 98%;
    height: 93%;
    opacity: 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .floating-control:hover {
    opacity: 1;
    backdrop-filter: blur(8px);
  }
</style>

<body>
  <div class="container">
    <h3 class="mt-4">
      Facebook Concerns Lists
    </h3>
    <div class="list-group mt-4">
      <?php
      include('conn.php');
      $sql = "SELECT * FROM `tbl_concerns` WHERE `resolved` = '0'";
      $query = mysqli_query($conn, $sql);
      $active = '';
      $num = 0;
      while ($row = mysqli_fetch_array($query)) {
        $concern = $row['concern'];
        $id = $row['id'];
        $num++;
        if ($num % 2 == 0) {
          $o = 'odd';
        } else {
          $o = 'even';
        }
        if ($o == 'odd') {
          $active = 'active';
        }else{
          $active ='';
        }
        echo
        '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start ' . $active . '">
        <div class="floating-control-container">
        <div class="floating-control">
        <button id="btnEdit" class="btn btn-warning m-1" data-text="'.$concern.'" data-id="'.$id.'">Edit</button>
        <button id="btnResolved" class="btn btn-success m-1" data-id="'.$id.'">Resolved</button>
        <!--button id="btnResolved" class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#fullScreenConcern" data-id="'.$id.'">Full Screen</button-->
        </div>
        </div>
        <div class="d-flex w-100 justify-content-between">
        <h1 class="mb-3 mt-2">' . $concern . '</h1>
        <!--small>3 days ago</small-->
        </div>
        <!-- <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
        <small>Donec id elit non mi porta.</small> -->
        </a>';
      }
      ?>

    </div>
  </div>
  <div class="modal fade modal-fullscreen-sm-down" id="fullScreenConcern" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <button id="btnAdd" class="btn btn-success btn-lg floating-btn">
    Add
  </button>
  <?php
    $rowCount = mysqli_num_rows($query);
    echo '<input id="countInp" style="display:none;" type="number" value="'.$rowCount.'">';
  ?>
  
  <input id="refreshCountInp" style="display:none;" type="number" value="">
  <input id="refreshBool" style="display:none;" type="number" value="0">
  <!-- UPDATE EDITS -->
  <?php
    $sqlCountConcern = "SELECT * FROM tbl_edit_concern";
    $queryCountConcern = mysqli_query($conn,$sqlCountConcern);
    $rowCountEditConcern = mysqli_num_rows($queryCountConcern);
    echo '<input id="countEditConcern" style="display:none;" type="number" value="'.$rowCountEditConcern.'">';
    ?>
    <input id="editedRefresh" style="display:none;" type="number" value="">
    <input id="refreshCountEditBool" style="display:none;" type="number" value="0">

</body>
<script src="../js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="../js/swal2.js" crossorigin="anonymous"></script>
<script src="../js/bootstrap.js" crossorigin="anonymous"></script>
<script>
  $('[id=btnEdit]').click(async function() {
    var textEdit = $(this).attr('data-text');
    var id = $(this).attr('data-id');
    const {
      value: newText
      } = await Swal.fire({
      input: 'textarea',
      inputLabel: 'Message',
      inputValue: textEdit,
      inputPlaceholder: 'Type your message here...',
      inputAttributes: {
        'aria-label': 'Type your message here'
      },
      showCancelButton: true
    })
    if (newText) {
      $.post('data.php', {
        editConcern: '1',
        textEdit: newText,
        id: id,
      }).done(function(response) {
        location.reload();
      });
    }
  });
  $('#btnAdd').click(async function() {
    const {
      value: text
      } = await Swal.fire({
      input: 'textarea',
      inputLabel: 'Message',
      inputPlaceholder: 'Type your message here...',
      inputAttributes: {
        'aria-label': 'Type your message here'
      },
      showCancelButton: true
    })
    if (text) {
      $.post('index.php', {
        concern: '1',
        text: text
      }).done(function() {
        location.reload();
      });
    }
  });
  $('[id=btnResolved]').click(async function() {
    var id = $(this).attr('data-id');
    $.post('data.php',{resolve:'1',id:id}).done(function(res){
      console.log(res);
      if(res == 'ok'){
        // swal.fire('Resolved','This concern iss reolved','success').then((result) => {
          location.reload();
        // });
      } 
    });
  })
  setInterval(refreshInp,800);
  setInterval(compareInp,900);
  setInterval(refreshList,1000);
  function refreshInp(){
    $.post('data.php',{count:1}).done(function(response){
      $('#refreshCountInp').val(response);
    })
  }
  function compareInp(){
    var inp1 = $('#countInp').val();
    var inp2 = $('#refreshCountInp').val();
    if (inp1 != inp2) {
      $('#refreshBool').val('1');
    }
  }
  function refreshList(){
    var refBool = $('#refreshBool').val();
    if (refBool == '1') {
      location.reload();
    }
  }
  // UPDATE EDITS
  setInterval(refreshCountEdit,800);
  setInterval(compareEdit,900);
  setInterval(refreshListEdit,1000);
  function refreshCountEdit(){
    $.post('data.php',{countEdit:1}).done(function(response){
      $('#editedRefresh').val(response);
    })
  }
  function compareEdit(){
    var inp1 = $('#countEditConcern').val();
    var inp2 = $('#editedRefresh').val();
    if (inp1 != inp2) {
      $('#refreshCountEditBool').val('1');
    }
  }
  function refreshListEdit(){
    var refBool = $('#refreshCountEditBool').val();
    if (refBool == '1') {
      location.reload();
    }
  }
</script>

</html>