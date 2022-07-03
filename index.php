<?php include('header.php'); ?>
<div id="root"></div>
<script type="text/javascript">
	document.title = "REST API FRONTEND"
	const root = document.querySelector('#root');
	fetch('https://wprestapi.test/wp-json?_fields=name,description')
		.then((data) => {
			if (data.status == 200) {
				return data.json()
			} else console.log('Not success, please try again')
		})
		.then((data) => {
			// console.log(data);
			root.innerHTML = `<h1>${data.name}</h2>`;
			root.innerHTML += `<h3>${data.description}</h3>`;
		})
		.catch(error => root.innerHTML = error)
	// ?_fields=id,date,title,excerpt,link,featured_media,fimg_url
	fetch('https://wprestapi.test/wp-json/wp/v2/posts?_fields=id,date,title,excerpt,link,featured_media,fimg_url')
		.then((data) => {
			if (data.status == 200) {
				return data.json()
			} else console.log('Not success, please try again')
		})
		.then((data) => {
			// ._embedded['wp:featuredmedia']['0'].source_url
			// console.log(data)
			root.innerHTML += `<ul>`;
			data.forEach(element => {
				// console.log(element);
				let postID = element.id;
				let published = new Date(element.date);
				root.innerHTML += `<div class="card mt-5" style="width: 18rem;">
				<div class="card-body">
				<img src="${element.fimg_url}" height="200" width="200">
					<h5 class="card-title">${element.title.rendered}</h5>
					<h6 class="card-subtitle mb-2 text-muted">${published.toLocaleDateString()} at ${published.toLocaleTimeString()}</h6>
					${element.excerpt.rendered}
					<a href="/single.php?id=${postID}" class="card-link">View Page</a>
					<a href="/edit.php?id=${postID}" class="card-link">Edit Page</a>
				</div>
			</div>
			`;
			});
			root.innerHTML += `</ul>`;
		});
</script>
<?php include('footer.php'); ?>