$(document).ready(function () { 
	let btnNew = document.getElementById('newImageButton');
	let btnSend = document.getElementById('sendButton');

	btnNew.addEventListener('click', function() {
		$.ajax({
			async: true,
			method:"GET",
			async: false,
			url: "newImage.php",
			success: function (response) {
				let imgResponse = jQuery.parseJSON(response);
				let newSrc = imgResponse.src;
				let newAlt = imgResponse.alt;
				
				$("#oceanPic").attr("src", newSrc);
				$("#oceanPic").attr("alt", newAlt);
			}
		});

	}, false);


	btnSend.addEventListener('click', function() {
		event.preventDefault();
		
		const sendData = {
			email: $("#email").val(),
			src: $("#oceanPic").attr("src"),
			alt: $("#oceanPic").attr("alt"),
		};

		$.ajax({
			async: true,
			method:"POST",
			async: false,
			url: "sendImage.php",
			data: sendData,
			success: function (response) {
				$("#result").text(response)
			}
		});		
	}, false);
			
}); 