/*$(document).ready(function(){
    setInterval(function(){
          $("#table").load(window.location.href + " #table" );
    }, 3000);
});*/
/*----------------------------------*/
//--------------------SWAL------------------
function swalAdd(){
    Swal.fire({
      icon: 'success',
      title: 'Ayos!',
      text: 'Added Successfully!' + name
    });
}
function swalSuccess(string){
    Swal.fire({
      icon: 'success',
      title: string,
      text: string + ' Successfully!'
    });
}
function swalSuccessHeadline(){
    Swal.fire({
      icon: 'success',
      title: 'Updated',
      text: 'All Set!'
    });
}
function swalErr(){
    Swal.fire({
      icon: 'error',
      title: 'Oops..',
      text: 'Empty Field!'
    });
}
function swalErrUpdate(){
    Swal.fire({
      icon: 'error',
      title: 'Oops..',
      text: 'Error Updating'
    });
}
function swalDel(id){
    Swal.fire({
        icon: 'info',
        title: 'Delete?',
        showDenyButton: true,
        confirmButtonText: 'Delete',
        denyButtonText: `Cancel`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        UpdateTable(id);
        CallFunctionNoTimer();
        Swal.fire('Deleted!', '', 'success');
      }
    });
}

function PermanentlyDelete(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        console.log(id);
            $(document).ready(function() {
                $.ajax({
                    type: "POST",
                    url: "delete.php",
                    data: {
                        PermDeleteID: id,
                    },
                    cache: false,
                    success: function(data) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
            });
        }
    });
}
$('#content').keyup( function() {
  $(this).val( $(this).val().replace( /\r?\n/gi, '' ) );
});

$('#content2').keyup( function() {
  $(this).val( $(this).val().replace( /\r?\n/gi, '' ) );
});

$('#content').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        var headline = $("#content").val();
        var span = $('#SpanLocNat :selected').text();
        if(headline=='') {
            swalErr();
            return false;
        }
        $.ajax({
            type: "POST",
            url: "add.php",
            data: {
                content: headline,
                span: span,
            },
            cache: false,
            success: function(data) {
                CallFunctionNoTimer();
                swalAdd();
                $("#content").val('');
            },
            error: function(xhr, status, error) {
                swalErr();
                console.error(xhr);
            }
        });
    }
});

$(document).ready(function() {
    $("#add").click(function() {
        var headline = $("#content").val();
        var span = $('#SpanLocNat :selected').text();
        if(headline=='') {
            swalErr();
            return false;
        }
        $.ajax({
            type: "POST",
            url: "add.php",
            data: {
                content: headline,
                span: span,
            },
            cache: false,
            success: function(data) {
                $("#content").val('');
                swalAdd();
               CallFunctionNoTimer();
            },
            error: function(xhr, status, error) {
                swalErr();
                console.error(xhr);
            }
        });
    });
});
//-----------------------SWAL ----------------------



//----------------------UPDATES--------------
function UpdateHeadlineL() {
    $(document).ready(function() {
        var inputNum = $("#inputNum").val();
        $.ajax({
            type: "POST",
            url: "set_new_num.php",
            data: {
                num: inputNum,
            },
            cache: false,
            success: function(data) {
                $("#inputNum").val(data);
            },
            error: function(xhr, status, error) {
                swalErr();
                console.error(xhr);
            }
        });
        $.ajax({
            type: "POST",
            url: "get_headline.php",
            data: {
                newNum: inputNum,
            },
            cache: false,
            success: function(data) {
                $("#newValue").val(data);
            },
            error: function(xhr, status, error) {
                swalErr();
                console.error(xhr);
            }
        });
    });
}

function UpdateTable(id){
    $(document).ready(function() {
        if(id == '') {
            swalErr();
            return false;
        }
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: {
                id: id,
            },
            cache: false,
            success: function(data) {
                $("#content").val('');
                CallFunctionNoTimer();
            },
            error: function(xhr, status, error) {
                swalErr();
                console.error(xhr);
            }
        });
    });
}

function UpdateItem(id,content,span) {
    $(document).ready(function() {
        if(id == '') {
            swalErr();
            return false;
        }
        $.ajax({
            type: "POST",
            url: "update.php",
            data: {
                id: id,
                content: content,
                span: span,
            },
            cache: false,
            success: function(data) {
                swalSuccess('Updated');
                CallFunctionNoTimer();
            },
            error: function(xhr, status, error) {
                swalErrUpdate();
                console.error(xhr);
            }
        });
    });
}
function edit(id) {
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "edit.php",
            data: {
                id: id,
            },
            cache: false,
            success: function(data) {
                swalEdit(data);
            },
            error: function(xhr, status, error) {
                swalErr();
                console.error(xhr);
            }
        });
    });
}
function swalEdit(data) {
    Swal.fire({
      title: 'Edit Headline',
      icon: 'info',
      html: data,
      showCloseButton: true,
      showCancelButton: true,
      focusConfirm: false,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Update',
      cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $("#headlineID").val();
            var headline = $("#content2").val();
            var span = $('#NationalLocal :selected').text();
            if(headline=='') {
                swalErr();
                return false;
            }else{
                UpdateItem(id,headline,span);
            }
        }
    });
}
function UpdateServer(ip){
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "update.php",
            data: {
                UpdateServer: ip,
            },
            cache: false,
            success: function(data) {
                swalSuccess(data);
            },
            error: function(xhr, status, error) {
                swalErr();
                console.error(xhr);
            }
        });
    });
}


function UpdateHeadline(id) {
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "get_headline.php",
            data: {
                TextID: id,
            },
            cache: false,
            success: function(data) {
                swalSuccess(data);

            },
            error: function(xhr, status, error) {
                swalErr();
                console.error(xhr);
            }
        });
    });
}
//--------------------EVENTS----------------
function Start() {
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "update.php",
            data: {
                UpdateStatus: '1',
            },
            cache: false,
            success: function(data) {
                swalSuccess(data);
            },
            error: function(xhr, status, error) {
                swalErr();
                console.error(xhr);
            }
        });
    });
}
function Stop() {
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "update.php",
            data: {
                UpdateStatus: '0',
            },
            cache: false,
            success: function(data) {
                swalSuccess(data);
            },
            error: function(xhr, status, error) {
                swalErr();
                console.error(xhr);
            }
        });
    });
}
function StartHeadline() {
    var inputNum = $("#timer").val();
    if (inputNum == 0) {
        $("#newValue").val('Stopped!');

    }else{
        console.log();
        UpdateHeadlineL();
    }
    window.setTimeout(StartHeadline, 11000);
}

//-----------------------END EVENTS-------------------

function DisplayStatus() {
   $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "display.php",
            data: {
                status: 'status',
            },
            cache: false,
            success: function(data) {
                $("#display_status").html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}

function DisplayPCServerStatus() {
   $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "display.php",
            data: {
                ServerIP: 'ip',
            },
            cache: false,
            success: function(data) {
                $("#server_label").html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}

function MonitorStatus(){
    var stat = $("#timer").val();
    if (stat == 0) {
        $('#start').attr("disabled", false);
        $('#stop').attr("disabled", true);
    }
    if (stat == 1) {
        $('#start').attr("disabled", true);
        $('#stop').attr("disabled", false);
    }
}

//--------------------------------------------END Status

function DisplayLocal() {
   $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "display.php",
            data: {
                local: 'local',
            },
            cache: false,
            success: function(data) {
                $("#display_local").html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}
function DisplayNational() {
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "display.php",
            data: {
                national: 'national',
            },
            cache: false,
            success: function(data) {
                $("#display_national").html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}
function DisplayDeleted() {
   $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "display.php",
            data: {
                deleted: 'deleted',
            },
            cache: false,
            success: function(data) {
                $("#display_deleted").html(data);
                console.log();
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}
function DisplayStandby() {
   $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "display.php",
            data: {
                Standby: 'standby',
            },
            cache: false,
            success: function(data) {
                $("#display_standby").html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}
function DisplayCrawlOnly() {
   $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "display.php",
            data: {
                Crawl: 'Crawl',
            },
            cache: false,
            success: function(data) {
                $("#display_crawl").html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}
function CallFunctions() {
    CallFunctionNoTimer();
    window.setTimeout(CallFunctions, 1000);
}
function CallFunctionNoTimer() {
    DisplayNational();
    DisplayLocal();
    DisplayStatus();
    MonitorStatus();
    DisplayPCServerStatus();
    DisplayDeleted();
    DisplayStandby();
    DisplayCrawlOnly();
}
