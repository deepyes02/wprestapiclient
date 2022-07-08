// promise
fetch('https://wprestapi.test/wp-json/')
	.then(function (response) {
		return response.json();
	})
	.then(function (data) {
		return data;
	})
	.catch(function (error) {
		return error;
	})

// changing classic funtion to arrow funciton


fetch('https://wprestapi.test/wp-json/')
	.then(response => response.json())
	.then(dataarr => dataarr)
	.catch(error => console.log(error))