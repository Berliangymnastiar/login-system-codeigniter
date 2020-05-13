// $(function () {
// 	$('.buttonAddSubmenu').on('click', function () {
// 		$('#newSubMenuModalLabel').html('Add new submenu')
// 		$('.modal-footer button[type=submit]').html('Add')
// 		$('#title').val('');
// 		$('#menu_id').val('');
// 		$('#url').val('');
// 		$('#icon').val('');
// 		$('#id').val('');
// 	})

// 	$('.tampilModalSub').on('click', function () {
// 		$('#newSubMenuModalLabel').html('Edit submenu')
// 		$('.modal-footer button[type=submit]').html('Edit')
// 		$('.modal-body form').attr('action', 'http://localhost/12-login/admin/editSubMenu')

// 		const id = $(this).data('id')
// 		$.ajax({
// 			url: 'http://localhost/12-login/admin/geteditSubMenu',
// 			data: {
// 				id: id
// 			},
// 			method: 'post',
// 			dataType: 'json',
// 			success: function (data) {
// 				$('#title').val(data.title)
// 				$('#menu_id').val(data.menu_id)
// 				$('#url').val(data.url)
// 				$('#icon').val(data.icon)
// 				$('#is_active').val(data.is_active)
// 				$('#id').val(data.id)
// 			}

// 		})
// 	})
// })
