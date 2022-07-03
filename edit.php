<?php include('header.php'); ?>
<div class="container">
	<div id="alert_outer" class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Holy guacamole!</strong> You should check in on some of those fields below.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
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
					<option selected value="publish">Published</option>
					<option value="draft">Draft</option>
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
	const notification_box = document.getElementById('alert_outer');
	notification_box.style.display = "none";


	postSubmitBtn.addEventListener('click', (e) => {
		e.preventDefault();
		if (inputTitle1.value && inputSlug1.value && mytextarea.value && publishStatus.value) {
			fetch('https://wprestapi.test/wp-json/wp/v2/posts', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'Authorization': 'Basic ' + btoa('deepyes02:oH1r sDnI xT7v ilc1 YBfh DUOw')
					},
					body: JSON.stringify({
						"title" : inputTitle1.value,
						"content" : mytextarea.value,
						"slug"		: inputSlug1.value,
						"status"	: publishStatus.value
					}),
				})
				.then(response => {
					if (response.ok == false) {
						notification_box.style.display = "block";
						notification_box.innerHTML = "<h2>Response invalid please try again</h2>";
					}
					console.log(response);
					return response.json()
				})
				.then(data => {
					notification_box.style.display = "block";
					notification_box.innerHTML = "<h2>Success, data posted</h2>";
					console.log(data);
				})
		} else {
			notification_box.style.display = "block";
			notification_box.innerHTML = "<h2>Please provide all input fields</h2>";
		}

	})
</script>


<?php include('footer.php'); ?>