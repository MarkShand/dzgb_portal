function SearchFilter() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("search-name");
    filter = input.value.toUpperCase();
    ul = document.getElementById("predefined");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
function Anchors(anchor){
	var text = "";
	var i;
	for (i = 0; i < anchor.length; i++) {
	  		text += "<li id='anchor"+i+"' onclick='Active();' class='list-group-item list-group-item-action btn btn-outline-info mt-2'> <a class='name'>"+ anchor[i][0]+"</a> <div style='display:none;' class='function'>"+ anchor[i][1] +"</div></li>";
	}
	document.getElementById("predefined").innerHTML = text;
}
function Headline(headline){
	var text = "";
	var i;
	for (i = 0; i < headline.length; i++) {
	  		text += "<li class='list-group-item list-group-item-action btn btn-outline-info mt-2'><a class='name'>"+headline[i]+"</a><div style='display:none;' class='function'>"+ headline[i]+"</div></li>";
	}
	document.getElementById("predefined").innerHTML = text;
}
function select_data(){
  	$("ul#predefined li").click(function(){
		cur_name = $(this).children('.name').text();
		cur_function = $(this).children('.function').text();
		cur_img = $(this).children('.img').text();
		$("#lower-thirds-name:text").val(cur_name);
		$("#lower-thirds-function:text").val(cur_function);
		$("#lower-thirds-img:text").val(cur_img);
	});
} 
function get_elements(type){
	name_to_send = $("#lower-thirds-name:text").val();
	function_to_send = $("#lower-thirds-function:text").val();

	if (document.getElementById("position-left").checked == true) {position = "left"};
	if (document.getElementById("position-right").checked == true) {position = "right"};

	if (document.getElementById(type + "1").checked == true) {channel = "bc-"+type+"1"};
	if (document.getElementById(type + "2").checked == true) {channel = "bc-"+type+"2"};
	if (document.getElementById(type + "3").checked == true) {channel = "bc-"+type+"3"};
	if (document.getElementById(type + "4").checked == true) {channel = "bc-"+type+"4"};
}

function send_data(animation,type) {
	get_elements(type);
	var ch = new BroadcastChannel(channel);
	ch.postMessage(name_to_send + '|' + function_to_send + '|' + position + '|' + animation); /* send - Animation In*/
}

function show_data(channel) {
	var bc = new BroadcastChannel(channel);
	
	bc.onmessage = function (ev) {
		document.getElementById('container').style.display = 'block';
		document.getElementById('container').style.textAlign = 'left';
		received_data=ev.data.split("|");
		document.getElementById("name").innerHTML = received_data[0];
		document.getElementById("function").innerHTML = received_data[1];
	//	document.getElementById("image").src="On the Phone\\" + received_data[4];
		position = received_data[2];
		animation = received_data[3];
		//console.log ('Name: ' + received_data[0] + ', Function: ' + received_data[1] + ', Position: ' + received_data[2] + ', Animation: ' + received_data[3]);
		if (animation == 'animateIn') {
			document.getElementById("lower-third").classList.remove("animateOut");
			document.getElementById("lower-third").classList.add("animateIn");
		}
		if (animation == 'animateOut') {
			document.getElementById("lower-third").classList.remove("animateIn");
			document.getElementById("lower-third").classList.add("animateOut");
		}
		if (position == 'left') {
			document.getElementById("lower-third").classList.remove("right");
			document.getElementById("lower-third").classList.add("left");
		}
		if (position == 'right') {
			document.getElementById("lower-third").classList.remove("left");
			document.getElementById("lower-third").classList.add("right");
		}
	}
}

function Active() {
   	$("li").click(function(){
	    $("li").removeClass("active");
	    $(this).addClass("active");
	});
}

function ActiveHeadline() {
   	$("li").click(function(){
	    $("li").removeClass("active");
	    $(this).addClass("active");
	    var program = $(this).children('.program').text();
	    var reporter = $(this).children('.reporter').text();
	    var headline = $(this).children('.headline').text();
	    var location = $(this).children('.location').text();
		$("#lower-thirds-program:text").val(program);
		$("#lower-thirds-reporter:text").val(reporter);
		$("#lower-thirds-headline:text").val(headline);
		$("#lower-thirds-location:text").val(location);
	});
}
function AutoShow(){
	if (document.getElementById("autoShowSwitch").checked == true){
		sendAnimationOut('animateOut','Hide');
		function delaySendHeadlineData(){
			sendHeadlinedata('animateIn');
		}
		window.setTimeout(delaySendHeadlineData,800);
	}
}
function show_headline(channel) {
	var bc = new BroadcastChannel(channel);
	
	bc.onmessage = function (ev) {
		document.getElementById('container').style.display = 'block';
		document.getElementById('container').style.textAlign = 'left';
		received_data = ev.data.split("|");
		document.getElementById("name").innerHTML = received_data[0];
		document.getElementById("function").innerHTML = received_data[1];
	//	document.getElementById("image").src="On the Phone\\" + received_data[4];

		position = received_data[2];
		animation = received_data[3];

		//console.log ('Name: ' + received_data[0] + ', Function: ' + received_data[1] + ', Position: ' + received_data[2] + ', Animation: ' + received_data[3]);
		if (animation == 'animateIn') {
			document.getElementById("lower-third").classList.remove("animateOut");
			document.getElementById("lower-third").classList.add("animateIn");
		}
		if (animation == 'animateOut') {
			document.getElementById("lower-third").classList.remove("animateIn");
			document.getElementById("lower-third").classList.add("animateOut");
		}
		if (position == 'left') {
			document.getElementById("lower-third").classList.remove("right");
			document.getElementById("lower-third").classList.add("left");
		}
		if (position == 'right') {
			document.getElementById("lower-third").classList.remove("left");
			document.getElementById("lower-third").classList.add("right");
		}
	}
}

function FilterHeadline() {
   keyword = $("#search-headline:text").val();
   $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "get headline.php",
            data: {
                keyword: keyword,
            },
            cache: false,
            success: function(data) {
                $("#predefined").html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}
function DisplayHeadline(){
	$(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "get headline.php",
            data: {
                headline: 'headline',
            },
            cache: false,
            success: function(data) {
                $("#predefined").html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}
function DisplayReporter(){
	$(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "get headline.php",
            data: {
                reporter: 'reporter',
            },
            cache: false,
            success: function(data) {
                $("#reporter").html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}
function display_Program(){
	$(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "get headline.php",
            data: {
                program: 'program',
            },
            cache: false,
            success: function(data) {
                $("#SelectProgram").html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}
function DisplayLocation(){
	var id = $("#reporter").val();
	$(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "get headline.php",
            data: {
                reporterID: id,
            },
            cache: false,
            success: function(data) {
                $("#reporter-location").html(data);
                $("#new-reporter-location").html(data);
                ActualHeadlines();
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}

function AddHeadline(){
	var program = $("#SelectProgram").val();
	var headline = $("textarea#addHeadline").val();
	var reporter = $("#reporter").val();
	var location = $("#reporter-location").val();
	$(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "get headline.php",
            data: {
                AddProgram: program,
                AddReporter: reporter,
                AddHeadline: headline,
                AddLocation:location,
            },
            cache: false,
            success: function(data) {
            	$("#badge").removeClass('hide');
            	$("#badge").html(data);
                $("textarea#addHeadline").val('');
                DisplayHeadline();
                window.setTimeout(hidebadge1,3000);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}
function hidebadge1(id){
	$('#badge').addClass("hide");
}
function hidebadge2(id){
	$('#badge2').addClass("hide");
}
function remove(id){
	$('#confirm'+id).addClass("hide");
	$('#cancel'+id).removeClass("hide");
	$('#remove'+id).removeClass("hide");
}
function confirmRemove(id) {
	$(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "get headline.php",
            data: {
                headlineID: id,
            },
            cache: false,
            success: function(data) {
            	$("#badge2").removeClass('hide');
                $("#badge2").html(data);
                window.setTimeout(hidebadge2, 2500);
                DisplayHeadline();
                ActualHeadlines();
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
}
function cancelRemove(id) {
	$('#confirm'+id).removeClass("hide");
	$('#cancel'+id).addClass("hide");
	$('#remove'+id).addClass("hide");
}
function ActualHeadlines(){
	$(document).ready(function() {
	    $.ajax({
	        type: "POST",
	        url: "get headline.php",
	        data: {
	        	countHeadlines: 'countHeadline',
	        },
	        cache: false,
	        success: function(data) {
	        	$("#lower-thirds-actual-count").val(data);
	        },
	        error: function(xhr, status, error) {
	            console.error(xhr);
	        }
	    });
	});
}
function New_Program(){
	Swal.fire({
	  	title: 'Add New Program',
	  	html: 
	  	'<div class="form-group">' +
	    	'<input id="new_program" required type="text" class="form-control">'+
		'</div>',
	  	showCancelButton: true,
	  	confirmButtonText: 'Save',
	}).then((result) => {
		var new_program = $("#new_program").val();
	  	if (result.isConfirmed) {
	  		if (new_program == '') {
	  			Swal.fire('Please input Program!', '', 'info')	
	  		}else{
	  			$.ajax({
			        type: "POST",
			        url: "get headline.php",
			        data: {
			        	new_program: new_program,
			        },
			        cache: false,
			        success: function(data) {
			        	CallFunctions();
			        	Swal.fire(data, '', 'success');
			        },
			        error: function(xhr, status, error) {
			            console.error(xhr);
			        }
			    });
	    		
	  		}
	  	}
	})
}
function new_Reporter(){
	Swal.fire({
	  	title: 'Add New Reporter',
	  	html: 
	  	'<div class="form-group"><label class="form-label position-left">Reporter</label>' +
	    	'<input id="new_reporter" required type="text" class="form-control">'+
		'</div>'+
		'<div class="form-group mt-3"><label class="form-label position-left">Reporter Location</label>' +
	    	'<select id="new-reporter-location" required class="form-control"></select>'+
		'</div>'
		,
	  	showCancelButton: true,
	  	confirmButtonText: 'Save',
	}).then((result) => {
		var new_reporter = $("#new_reporter").val();
		var new_reporter_location = $("#new-reporter-location").val();
	  	if (result.isConfirmed) {
	  		if (new_reporter == '') {
	  			Swal.fire('Please add Reporter!', '', 'info')	
	  		}else{
	  			$.ajax({
			        type: "POST",
			        url: "get headline.php",
			        data: {
			        	new_reporter: new_reporter,
			        	new_reporter_location: new_reporter_location,
			        },
			        cache: false,
			        success: function(data) {
			        	CallFunctions();
			        	Swal.fire(data, '', 'success');
			        },
			        error: function(xhr, status, error) {
			            console.error(xhr);
			        }
			    });
	  		}
	  	}
	})
	DisplayLocation();
}
function new_location(){
	Swal.fire({
	  	title: 'Add New Location',
	  	html: 
	  	'<div class="form-group">' +
	    	'<input id="new_location" required type="text" class="form-control">'+
		'</div>',
	  	showCancelButton: true,
	  	confirmButtonText: 'Save',
	}).then((result) => {
		var new_location = $("#new_location").val();
	  	if (result.isConfirmed) {
	  		if (new_location == '') {
	  			Swal.fire('Please input location!', '', 'info')	
	  		}else{
	  			$.ajax({
			        type: "POST",
			        url: "get headline.php",
			        data: {
			        	new_location: new_location,
			        },
			        cache: false,
			        success: function(data) {
			        	CallFunctions();
			        	Swal.fire(data, '', 'success');
			        },
			        error: function(xhr, status, error) {
			            console.error(xhr);
			        }
			    });
	    		
	  		}
	  	}
	})
}
function NewCountHeadlines(){
	$(document).ready(function() {
	    $.ajax({
	        type: "POST",
	        url: "get headline.php",
	        data: {
	        	countHeadlines: 'countHeadline',
	        },
	        cache: false,
	        success: function(data) {
	        	$("#lower-thirds-new-count").val(data);
	        },
	        error: function(xhr, status, error) {
	            console.error(xhr);
	        }
	    });
	});
	window.setTimeout(NewCountHeadlines, 800);
	var actualCount = $("#lower-thirds-actual-count").val();
	var newCount = $("#lower-thirds-new-count").val();
	if (newCount != actualCount) {
		DisplayHeadline();
		ActualHeadlines();
	}
}
function edit_Headline(id){
	$(document).ready(function() {
	    $.ajax({
	        type: "POST",
	        url: "edit.php",
	        data: {
	        	id: id,
	        },
	        cache: false,
	        success: function(data) {
	        	Swal.fire({
				  	title: 'Edit Data',
				  	html: data,
				  	showCancelButton: true,
				  	confirmButtonText: 'Save',
				}).then((result) => {
				  	if (result.isConfirmed) {
						var edited_id = $("#edited_id").val();
				  		var edited_program = $("#edited_program").val();
						var edited_headline = $("textarea#edited_headline").val();
						var edited_reporter = $("#edited_reporter").val();
						var edited_location = $("#edited_location").val();
				  		$.ajax({
					        type: "POST",
					        url: "get headline.php",
					        data: {
					        	edited_id: edited_id,
					        	edited_headline: edited_headline,
					        	edited_program: edited_program,
					        	edited_reporter: edited_reporter,
					        	edited_location: edited_location,
					        },
					        cache: false,
					        success: function(data) {
					        	CallFunctions();
				    			Swal.fire(data, '', 'success');
					        },
					        error: function(xhr, status, error) {
					            console.error(xhr);
					        }
					    });
				  	} else if (result.isDenied) {
				    	Swal.fire('Changes are not saved', '', 'info')
				  	}
				})
	        },
	        error: function(xhr, status, error) {
	            console.error(xhr);
	        }
	    });
	});
	
}
function sendHeadlinedata(animation) {
	sendAnimationOut('animateOut','Hide');
	var program = $("#lower-thirds-program:text").val();
	var reporter = $("#lower-thirds-reporter:text").val();
	var headline = $("#lower-thirds-headline:text").val();
	var location = $("#lower-thirds-location:text").val();
	var ch = new BroadcastChannel('headlineData');
	ch.postMessage(program + '|' + reporter + '|' + headline + '|' + location + '|' + animation);
}
function sendAnimationOut(animation,channel){
	var ch = new BroadcastChannel(channel);
	ch.postMessage(animation);
}
function showHeadlineData(channel) {
	var bc = new BroadcastChannel(channel);
	bc.onmessage = function (ev) {
		received_data = ev.data.split("|");
		document.getElementById("program").innerHTML = received_data[0];
		document.getElementById("reporter").innerHTML = received_data[1];
		document.getElementById("headline-text").innerHTML = received_data[2];
		var headline_text = received_data[2];
		var text_length = headline_text.length;
		console.log(text_length);
		if (text_length >= 110) {
			$("#headline-text").removeClass("headline-text-large");	
			$("#headline-text").removeClass("headline-text");
			$("#headline-text").addClass("headline-text-medium");
		}else if (text_length <= 60) {
			$("#headline-text").addClass("headline-text-large");
			$("#headline-text").removeClass("headline-text-medium");
			$("#headline-text").removeClass("headline-text");
		}else{
			$("#headline-text").removeClass("headline-text-large");
			$("#headline-text").addClass("headline-text");
			$("#headline-text").removeClass("headline-text-medium");
		}
		reporterLocation = received_data[3];
		animation = received_data[4];
		//console.log ('Program: ' + received_data[0] + ', Reporter: ' + received_data[1] + ', Headline: ' + received_data[2] + ', Location: ' + received_data[3]);
		if (animation == 'animateIn') {
			AnimationRemove();
			AnimationAdd();
		}
	}
}
function AnimationAdd(){
	$("#headline-backdrop-top").addClass("animate-in-backdrop-top");
	$("#headline-backdrop-bottom").addClass("animate-in-backdrop-bottom");
	$("#headline-top").addClass("animate-in-top");
	$("#headline-text-container").addClass("animate-in-text-container");
	$("#headline-bottom").addClass("animate-in-bottom");
}
function AnimationRemove(){
	$("#headline-backdrop-top").removeClass("animate-out-backdrop-top");
	$("#headline-backdrop-bottom").removeClass("animate-out-backdrop-bottom");
	$("#headline-top").removeClass("animate-out-top");
	$("#headline-text-container").removeClass("animate-out-text-container");
	$("#headline-bottom").removeClass("animate-out-bottom");
}
function AnimationHide(){
	$("#headline-backdrop-top").removeClass("animate-in-backdrop-top");
	$("#headline-backdrop-bottom").removeClass("animate-in-backdrop-bottom");
	$("#headline-top").removeClass("animate-in-top");
	$("#headline-text-container").removeClass("animate-in-text-container");
	$("#headline-bottom").removeClass("animate-in-bottom");

	$("#headline-backdrop-top").addClass("animate-out-backdrop-top");
	$("#headline-backdrop-bottom").addClass("animate-out-backdrop-bottom");
	$("#headline-top").addClass("animate-out-top");
	$("#headline-text-container").addClass("animate-out-text-container");
	$("#headline-bottom").addClass("animate-out-bottom");
}
function HideAnimation(channel) {
	var bc = new BroadcastChannel(channel);
	bc.onmessage = function (ev) {
		received_data = ev.data.split("|");
		animation = received_data[0];
		//console.log ('Animation: ' + received_data[0]);
		if (animation == 'animateOut') {
			AnimationHide();
		}
	}
}

function clearSearch(){
	var search = document.getElementById("search-headline");
	search.value = "";
	CallFunctions();
}

function CallFunctions() {
	DisplayHeadline();
	DisplayReporter();
	DisplayLocation();
	display_Program();
}
function Click(){
	DisplayHeadline();
	DisplayReporter();
	DisplayLocation();
	display_Program();
}