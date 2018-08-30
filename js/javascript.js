$(document).ready(function() {
	setInterval(timestamp, 1000);
});

function timestamp() {
	var ajaxUrl = baceTimestamp.ajaxurl;
	$.ajax({
		url: ajaxUrl,
		success: function(data) {
			$('#bace-timestamp__date').html(data);
		},
	});
}
