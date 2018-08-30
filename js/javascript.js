$(document).ready(function() {
	setInterval(timestamp, 1000);
});

// function timestamp() {
// 	var ajaxUrl = baceTimestamp.ajaxurl;
// 	console.log(ajaxUrl);
//
// }

function timestamp() {
	var ajaxUrl = baceTimestamp.ajaxurl;
	$.ajax({
		url: ajaxUrl,
		success: function(data) {
			// $('#timestamp').html(data);
			// console.log(data);
		},
	});
}
