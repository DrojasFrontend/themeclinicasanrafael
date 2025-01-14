import { initClickableCards } from "./card-click-init";

jQuery(document).ready(function ($) {
    initClickableCards(".clickeable");
    // Búsqueda
    $("#searchServicios, #searchServiciosMobile").on("keyup", function () {
        var searchTerm = $(this).val();
        var order = getCurrentOrder();
        $("#loading-servicios").show();
        $("#resultados-servicios").hide();

        $.ajax({
            url: lm_params.ajaxurl,
            type: "POST",
            data: {
                action: "search_servicios",
                search: searchTerm,
                order: order
            },
            success: function (response) {
                actualizarResultadosServicios(response);
                $("#loading-servicios").hide();
                $("#resultados-servicios").show();
                initClickableCards(".clickeable");
            },
        });
    });

    // Ordenamiento
    $("#orderServicios").on("change", function() {
        var orderValue = $(this).val();
        if (!orderValue) return;

        $("#loading-servicios").show();
        $("#resultados-servicios").hide();

        $.ajax({
            url: lm_params.ajaxurl,
            type: "POST",
            data: {
                action: "order_servicios",
                order: orderValue
            },
            success: function(response) {
                actualizarResultadosServicios(response);
                $("#loading-servicios").hide();
                $("#resultados-servicios").show();
                initClickableCards(".clickeable");
            }
        });
    });

    function getCurrentOrder() {
        return $("#orderServicios").val() || 'ASC';
    }

    function actualizarResultadosServicios(posts) {
        var html = "";
        if (posts.length > 0) {
            posts.forEach(function (post) {
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
            html += '<div class="no-results">';
            html += '<h3 class="font-gilda h2 text-secondary mb-24 text-center">No se encontraron servicios</h3>';
            html += '<a href="/servicios" class="btn btn-primary btn-center">Volver</a>';
            html += '</div>';
        }
        $("#resultados-servicios").html(html);
    }
});