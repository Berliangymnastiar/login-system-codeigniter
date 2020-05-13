// // Code Edit Menu
// $(function () {
// 	$('.buttonAddMenu').on('click', function () {
// 		$('#formModalLabel').html('Add New Menu')
// 		$('.modal-footer button[type=submit]').html('Add')
// 	})

// 	$('.tampilModalEdit').on('click', function () {
// 		$('#formModalLabel').html('Edit Menu')
// 		$('.modal-footer button[type=submit]').html('Edit')
// 		$('.modal-body form').attr('action', 'http://localhost/12-login/admin/edit')

// 		const id = $(this).data('id')
// 		$.ajax({
// 			url: 'http://localhost/12-login/admin/getedit',
// 			data: {
// 				id: id
// 			},
// 			method: 'post',
// 			dataType: 'json',
// 			success: function (data) {
// 				$('#menu').val(data.menu);
// 				$('#id').val(data.id);
// 			}
// 		})
// 	})


// })
