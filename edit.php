<?php include('header.php');
echo "Add a new post";
?>
<div class="container">
	<form>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="inputTitle1" placeholder="Title for the Post">
			</div>
			<div class="form-group col-md-6">
				<label for="inputSlug1">Slug</label>
				<input type="text" class="form-control" id="inputSlug1" placeholder="slug-for-post">
			</div>
		</div>
		<div class="form-row">
			<textarea id="mytextarea">Hello, World!</textarea>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="publishStatus">Publish Status (Default published)</label>
				<select id="publishStatus" class="form-control">
					<option selected>Published</option>
					<option>Draft</option>
				</select>
			</div>
		</div>
		<button type="submit" id="postSubmitBtn" class="mt-2 btn btn-primary">Update</button>
	</form>
</div>


<script type="text/javascript">
	const inputTitle1 = document.getElementById('inputTitle1');
	const inputSlug1 = document.getElementById('inputSlug1');
	const mytextarea = document.getElementById('mytextarea');
	const publishStatus = document.getElementById('publishStatus');
	const postSubmitBtn = document.getElementById('postSubmitBtn');

	const username = 'deepyes02';
	const password = 'oH1r sDnI xT7v ilc1 YBfh DUOw';
	const encoded = "Basic " + btoa(username + ':' + password);

	postSubmitBtn.addEventListener('click', (e) => {
		e.preventDefault();
		fetch('https://wprestapi.test/wp-json/wp/v2/posts', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
				'Authorization': 'Basic ' + btoa('deepyes02:oH1r sDnI xT7v ilc1 YBfh DUOw')
			},
			body: 'title=New Title'
		});


	})
</script>



<?php
include('footer.php');
