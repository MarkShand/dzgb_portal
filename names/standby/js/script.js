function itemClick(me){
	$('div#standby-item').removeClass('bg-primary');
	$(me).removeClass('bg-dark').addClass('bg-primary');
	name = $(me).attr('data-name');

	rand = Math.floor(Math.random() * 1000) + 1;

	tx = new BroadcastChannel('standby-channel');
	tx.postMessage(name + '|' + rand);
	console.log(name);
}

function edit(me){
	id = $(me).attr('item-id');
	name = $(me).attr('item-name');
	Swal.fire({
		title: 'Edit Item',
		input: 'text',
		inputValue: name,
		inputPlaceholder: 'Type here',
		showCancelButton: true,
		inputValidator: (value) => {
			if (!value) {
				return 'You need to write something!'
			}else {
				$.ajax({
					method: 'post',
					url:'post.php',
					data:{
						'edit' : 1,
						'edit-id' : id,
						'edit-name' : value
					},
					success: function(data){
						Swal.fire('Updated!');
						console.log(data);
						$("#search-result").load(window.location.href + " #search-result");
					}
				});
			}
		}
	});
}

function remove(me){
	id = $(me).attr('item-id');
	Swal.fire({
		title: 'Delete this?',
		showCancelButton: true,
		confirmButtonText: 'Yes',
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				method: 'post',
				url:'post.php',
				data:{
					'delete' : 1,
					'delete-id' : id,
				},
				success: function(data){
					Swal.fire('Deleted!', '', 'success')
					console.log(data);
					$("#search-result").load(window.location.href + " #search-result");
				}
			});
		}
	});
}
