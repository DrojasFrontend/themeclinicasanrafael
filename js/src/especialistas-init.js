jQuery(document).ready(function ($) {
	$("#searchEspecialistas").on("keyup", function () {
		var searchTerm = $(this).val();
		$("#loading").show();
		$("#resultados").hide();

		$.ajax({
			url: lm_params.ajaxurl,
			type: "POST",
			data: {
				action: "search_especialistas",
				search: searchTerm,
			},
			success: function (response) {
				actualizarResultados(response);
				$("#loading").hide();
				$("#resultados").show();
			},
		});
	});

  $("#searchEspecialistasMobile").on("keyup", function () {
		var searchTerm = $(this).val();
		$("#loading").show();
		$("#resultados").hide();

		$.ajax({
			url: lm_params.ajaxurl,
			type: "POST",
			data: {
				action: "search_especialistas",
				search: searchTerm,
			},
			success: function (response) {
				actualizarResultados(response);
				$("#loading").hide();
				$("#resultados").show();
			},
		});
	});

	// Filtro por letra
	$("#letterFilterEsp button").on("click", function () {
		var letra = $(this).data("letra");
		$("#loading").show();
		$("#resultados").hide();

		$.ajax({
			url: lm_params.ajaxurl,
			type: "POST",
			data: {
				action: "filter_especialistas",
				letra: letra,
			},
			success: function (response) {
				actualizarResultados(response);
				$("#loading").hide();
				$("#resultados").show();
			},
		});
	});

	function actualizarResultados(posts) {
    var html = "";
    if (posts.length > 0) {
      posts.forEach(function (post) {
        html += '<h2 class="h2 m-0 mb-lg-72 mb-42 text-secondary">Nuestros especialistas</h2>';
        html += '<div class="col-lg-3 mb-36">';
        html += '<div class="rounded overflow-hidden clickeable h-lg-100 hover">';
        if (post.thumbnail) {
            html += '<img class="img-fluid d-flex" src="' + post.thumbnail + '" alt="' + post.post_title + '" title="' + post.post_title + '">';
        }
        html += '<div class="p-24 bg-white h-lg-100">';
        html += '<h3 class="h5 text-secondary-100 mb-12">' + post.post_title + '</h3>';
        html += '<a href="' + post.permalink + '" class="font-sans p text-primary fw-bold d-flex align-center gap-6">';
				html += '<span class="hover-link">Conoce más</span>';
				html += '<i class="icono icono-flecha"></i>';
				html += '</a>';
        html += '</div></div></div>';
      });
    } else {
			html += '<h3 class="h3 m-0 mb-lg-72 mb-42 text-secondary">No se encontraron especialistas/h3>';
    }
    $("#resultados").html(html);
 }
});
