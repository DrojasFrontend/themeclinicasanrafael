jQuery(document).ready(function ($) {
	$("#searchEspecialidades").on("keyup", function () {
		var searchTerm = $(this).val();
		$("#loading").show();
		$("#resultados").hide();

		$.ajax({
			url: lm_params.ajaxurl,
			type: "POST",
			data: {
				action: "search_especialidades",
				search: searchTerm,
			},
			success: function (response) {
				actualizarResultados(response);
				$("#loading").hide();
				$("#resultados").show();
			},
		});
	});

  $("#searchEspecialidadesMobile").on("keyup", function () {
		var searchTerm = $(this).val();
		$("#loading").show();
		$("#resultados").hide();

		$.ajax({
			url: lm_params.ajaxurl,
			type: "POST",
			data: {
				action: "search_especialidades",
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
	$("#letterFilter button").on("click", function () {
		var letra = $(this).data("letra");
		$("#loading").show();
		$("#resultados").hide();

		$.ajax({
			url: lm_params.ajaxurl,
			type: "POST",
			data: {
				action: "filter_especialidades",
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
        html += '<div class="col-lg-3 mb-36 1">';
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
				html += '<div><a href="/especialidades" class="btn btn-primary btn-center">Volver</a></div>';
      });
    } else {
			html += '<div class="no-results">';
			html += '<h3 class="font-gilda h3 text-secondary mb-24 text-center">No se encontraron especialidades</h3>';
			html += '<a href="/especialidades" class="btn btn-primary btn-center">Volver</a>';
			html += '</div>';
    }
    $("#resultados").html(html);
 	}
});
