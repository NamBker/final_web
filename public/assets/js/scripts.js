var tag = new Taggle('example1', {
    tags: ['Try', 'entering', 'one', 'of', 'these', 'tags']
});

/*
$( document ).ready(function() {
	$( "#submit" ).click(function(event) {
		event.preventDefault();
		var data = tag.getTagValues();
		$.ajax({
		  type: "POST",
		  url: "http://192.168.33.50/admin/posts",
		  data: JSON.stringify(data);,
		  success: function(data) {
		  	alert(data);
		  },
		  dataType: 'json'
		});
	});
});
*/

$( "#submit" ).click(function(event) {
	event.prevent	Default();
	var tags = tag.getTagValues();
	var title = $('#form_title').val();
	var slug = $('#form_slug').val();
	var summary = $('#form_summary').val();
	var body = $('#form_body').val();
	console.log(body);
	$.ajax({
	  type: "POST",
	  url: "http://192.168.33.50/admin/posts/create",
	  data: {
	  	tags : JSON.stringify(tags),
	  	title : title,
	  	slug : slug,
	  	summary : summary,
	  	body : body
	  },
	  success: function(data) {
	  	alert(data);
	  },
	  dataType: 'json'
	});

	// window.location="admin/posts/view";
});