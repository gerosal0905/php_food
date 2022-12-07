
<div class="container-fluid">
	<form action="" id="newUser-frm">
        <!-- <div class="form-group">
			<input type="text" name="id" value="" class="form-control" placeholder="id">
		</div> -->
		<div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" name="name" required="" class="form-control" placeholder="name">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Username</label>
			<input type="text" name="username" required="" class="form-control" placeholder="username">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control" value="" placeholder="password">
		</div>
        <div class="form-group">
			<input type="hidden" name="type" required="" class="form-control" value="1">
		</div>
		<button class="button btn btn-info btn-sm">Create</button>
	</form>
</div>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<script>
	$('#newUser-frm').submit(function(e){
		e.preventDefault()
		$('#newUser-frm button[type="submit"]').attr('disabled',true).html('Saving...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#newUser-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success:function(resp){
                console.log(resp)
				if(resp == 1){
					location.href ='index.php?page=users';
				}else{
					$('#newUser-frm').prepend('<div class="alert alert-danger">Username already exist.</div>')
					$('#newUser-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		})
	})
</script>