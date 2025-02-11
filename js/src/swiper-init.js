import $ from "jquery";
import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";

export const initServiciosSwiper = () => {
	const swiper = new Swiper(".serviciosSwiper", {
		modules: [Pagination, Navigation],
		slidesPerView: "auto",
		spaceBetween: 36,
		centeredSlides: false,
		navigation: {
			nextEl: ".swiper-button-next-not",
			prevEl: ".swiper-button-prev-not",
			clickable: true,
			disabledClass: "swiper-nav-disabled",
		},
		pagination: {
			el: ".swiper-pagination-ser",
			type: "bullets",
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 2.2,
				spaceBetween: 24,
			},
			768: {
				slidesPerView: 3.1,
				spaceBetween: 20,
			},
			1280: {
				slidesPerView: 4.5,
				spaceBetween: 20,
			},
			1366: {
				slidesPerView: 4.5,
				spaceBetween: 36,
			},
		},
		on: {
			init: function () {
				updateServiciosFraction(this);
			},
			slideChange: function () {
				updateServiciosFraction(this);
			},
		},
	});

	function updateServiciosFraction(swiper) {
		const currentIndex = swiper.realIndex + 1;
		const totalSlides = swiper.slides.length;
		const fractionHtml = `
			<span class="current">${currentIndex}</span>
			<span class="separator">/</span>
			<span class="total">${totalSlides}</span>
		`;
		document.querySelector(".swiper-fraction-ser") ? document.querySelector(".swiper-fraction-ser").innerHTML = fractionHtml : null;

	}

	function initHeightServicios() {
		if ($(".serviciosSwiper").length) {
			$(".serviciosSwiper .swiper-slide h3").height("auto");

			let maxHeightServicios = 0;
			$(".serviciosSwiper .swiper-slide h3").each(function () {
				let height = $(this).height();
				maxHeightServicios =
					height > maxHeightServicios ? height : maxHeightServicios;
			});
			$(".serviciosSwiper .swiper-slide h3").height(maxHeightServicios);
		}
	}

	initHeightServicios();

	let resizeTimerServicios;
	$(window).on("resize", function () {
		clearTimeout(resizeTimerServicios);
		resizeTimerServicios = setTimeout(function () {
			initHeightServicios();
			swiper.update();
		}, 250);
	});
};

export const initContactoBottomSwiper = () => {
	// Solo inicializar Swiper si estamos en desktop
	if (window.innerWidth >= 768) {
		const swiper = new Swiper(".contactoBottomSwiper", {
			modules: [Pagination, Navigation],
			slidesPerView: "auto",
			spaceBetween: 36,
			centeredSlides: false,
			navigation: {
				nextEl: ".swiper-button-next-con",
				prevEl: ".swiper-button-prev-con",
				clickable: true,
				disabledClass: "swiper-nav-disabled",
			},
			pagination: {
				el: ".swiper-pagination-con",
				type: "bullets",
				clickable: true,
			},
			breakpoints: {
				768: {
					slidesPerView: 2,
					spaceBetween: 20,
				},
				1280: {
					slidesPerView: 1.8,
					spaceBetween: 20,
				},
				1366: {
					slidesPerView: 1.8,
					spaceBetween: 36,
				},
			},
			on: {
				init: function () {
					updateServiciosFraction(this);
				},
				slideChange: function () {
					updateServiciosFraction(this);
				},
			},
		});
	}

	function updateServiciosFraction(swiper) {
		const currentIndex = swiper.realIndex + 1;
		const totalSlides = swiper.slides.length;
		const fractionHtml = `
      <span class="current">${currentIndex}</span>
      <span class="separator">/</span>
      <span class="total">${totalSlides}</span>
    `;
		document.querySelector(".swiper-fraction-ser") ? document.querySelector(".swiper-fraction-ser").innerHTML = fractionHtml : null;
	}
};

export const initNoticiasSwiper = () => {
	const swiper = new Swiper(".noticiasSwiper", {
		modules: [Pagination, Navigation],
		slidesPerView: 3,
		spaceBetween: 36,
		centeredSlides: false,
		pagination: {
			el: ".swiper-pagination-not",
			type: "bullets",
			clickable: true,
		},
		navigation: {
			disabledClass: "swiper-nav-disabled",
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 1.2,
				spaceBetween: 30,
			},
			768: {
				slidesPerView: 3,
				spaceBetween: 20,
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 36,
			},
		},
		on: {
			init: function () {
				updateServiciosFraction(this);
			},
			slideChange: function () {
				updateServiciosFraction(this);
			},
		},
	});

	function updateServiciosFraction(swiper) {
		const currentIndex = swiper.realIndex + 1;
		const totalSlides = swiper.slides.length;
		const fractionHtml = `
			<span class="current">${currentIndex}</span>
			<span class="separator">/</span>
			<span class="total">${totalSlides}</span>
		`;
		document.querySelector(".swiper-fraction-not").innerHTML = fractionHtml;
	}

	function initHeightNoticias() {
		if ($(".noticiasSwiper").length) {
			$(".noticiasSwiper .swiper-slide h3").height("auto");

			let maxHeightnoticias = 0;
			$(".noticiasSwiper .swiper-slide h3").each(function () {
				let height = $(this).height();
				maxHeightnoticias =
					height > maxHeightnoticias ? height : maxHeightnoticias;
			});
			$(".noticiasSwiper .swiper-slide h3").height(maxHeightnoticias);
		}
	}

	initHeightNoticias();

	let resizeTimer;
	$(window).on("resize", function () {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function () {
			initHeightNoticias();
			swiper.update();
		}, 250);
	});
};

export const initServiciosDestacadosSwiper = () => {
	const swiper = new Swiper(".serviciosDestacadosSwiper", {
		modules: [Pagination, Navigation],
		slidesPerView: 3,
		spaceBetween: 36,
		centeredSlides: false,
		pagination: {
			el: ".swiper-pagination-ser",
			type: "bullets",
			clickable: true,
		},
		navigation: {
			disabledClass: "swiper-nav-disabled",
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 1.2,
				spaceBetween: 18,
			},
			768: {
				slidesPerView: 2,
				spaceBetween: 18,
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 18,
			},
			1200: {
				slidesPerView: 3,
				spaceBetween: 24,
			},
			1280: {
				slidesPerView: 4,
				spaceBetween: 36,
			},
		},
		on: {
			init: function () {
				updateServiciosDestacadosFraction(this);
			},
			slideChange: function () {
				updateServiciosDestacadosFraction(this);
			},
		},
	});

	function updateServiciosDestacadosFraction(swiper) {
		const currentIndex = swiper.realIndex + 1;
		const totalSlides = swiper.slides.length;
		const fractionHtml = `
			<span class="current">${currentIndex}</span>
			<span class="separator">/</span>
			<span class="total">${totalSlides}</span>
		`;
		document.querySelector(".swiper-fraction-ser") ? document.querySelector(".swiper-fraction-ser").innerHTML = fractionHtml : null;
	}

	function initHeightServiciosDestacados() {
		if ($(".serviciosDestacadosSwiper").length) {
			$(".serviciosDestacadosSwiper .swiper-slide h3").height("auto");

			let maxHeightServiciosDestacados = 0;
			$(".serviciosDestacadosSwiper .swiper-slide h3").each(function () {
				let height = $(this).height();
				maxHeightServiciosDestacados =
					height > maxHeightServiciosDestacados
						? height
						: maxHeightServiciosDestacados;
			});
			$(".serviciosDestacadosSwiper .swiper-slide h3").height(
				maxHeightServiciosDestacados
			);
		}
	}

	initHeightServiciosDestacados();

	let resizeTimer;
	$(window).on("resize", function () {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function () {
			initHeightServiciosDestacados();
			swiper.update();
		}, 250);
	});
};

export const initHeroCaruselSwiper = () => {
	const swiper = new Swiper(".heroCaruselSwiper", {
		modules: [Pagination, Navigation],
		slidesPerView: 1,
		spaceBetween: 10,
		centeredSlides: false,
		pagination: {
			el: ".swiper-pagination",
			type: "bullets",
			clickable: true,
		},
		navigation: {
			disabledClass: "swiper-nav-disabled",
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
			clickable: true,
		},
		on: {
			init: function () {
				updateHeroCaruselFraction(this);
			},
			slideChange: function () {
				updateHeroCaruselFraction(this);
			},
		},
	});

	function updateHeroCaruselFraction(swiper) {
		const currentIndex = swiper.realIndex + 1;
		const totalSlides = swiper.slides.length;
		const fractionHtml = `
			<span class="current">${currentIndex}</span>
			<span class="separator">/</span>
			<span class="total">${totalSlides}</span>
		`;
		document.querySelector(".swiper-fraction").innerHTML = fractionHtml;
	}
};

export const initTarjetaTextoSwiper = () => {
	const swiper = new Swiper(".tarjetaTextoSwiper", {
		modules: [Pagination, Navigation],
		enabled: window.innerWidth < 1024,
		slidesPerView: 1,
		spaceBetween: 10,
		pagination: {
			el: ".swiper-pagination-tar",
			clickable: true,
		},
		navigation: {
			disabledClass: "swiper-nav-disabled",
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		breakpoints: {
			320: {
				slidesPerView: 1.2,
				spaceBetween: 24,
			},
		},
		on: {
			init: function () {
				setTimeout(() => {
					updateTarjetaTextFraction(this);
					updateNavigationState(this);
				}, 100);
			},
			slideChange: function () {
				updateTarjetaTextFraction(this);
				updateNavigationState(this);
			},
		},
	});

	function updateNavigationState(swiper) {
		if (!swiper.enabled) return;

		// Asegurarse de obtener el total real de slides
		const totalSlides = swiper.slides.length;
		const currentIndex = swiper.realIndex;

		const prevButton = document.querySelector(".swiper-button-prev");
		const nextButton = document.querySelector(".swiper-button-next");

		if (prevButton) {
			prevButton.classList.toggle("swiper-button-disabled", currentIndex === 0);
		}
		if (nextButton) {
			nextButton.classList.toggle(
				"swiper-button-disabled",
				currentIndex === totalSlides - 1
			);
		}
	}

	function updateTarjetaTextFraction(swiper) {
		// Asegurarse de obtener el total real de slides
		const totalSlides = swiper.slides.length;
		// Si no hay slides, no actualizar
		if (totalSlides === 0) return;

		const currentIndex = swiper.realIndex + 1;
		const fractionHtml = `
      <span class="current">${currentIndex}</span>
      <span class="separator">/</span>
      <span class="total">${totalSlides}</span>
    `;

		const fractionElement = document.querySelector(".swiper-fraction-tar");
		if (fractionElement) {
			fractionElement.innerHTML = fractionHtml;
		}
	}

	// Habilitar/deshabilitar en resize
	window.addEventListener("resize", () => {
		swiper.enabled = window.innerWidth < 1024;
		// Esperar a que se complete el resize antes de actualizar
		setTimeout(() => {
			swiper.update();
			updateTarjetaTextFraction(swiper);
			updateNavigationState(swiper);
		}, 100);
	});

	// Actualización inicial después de que todo esté cargado
	window.addEventListener("load", () => {
		swiper.update();
		updateTarjetaTextFraction(swiper);
		updateNavigationState(swiper);
	});
};

export const initVacantesSwiper = () => {
	const swiper = new Swiper(".vacantesSwiper", {
		modules: [Pagination, Navigation],
		slidesPerView: 3,
		spaceBetween: 36,
		centeredSlides: false,
		pagination: {
			el: ".swiper-pagination-vac",
			type: "bullets",
			clickable: true,
		},
		navigation: {
			disabledClass: "swiper-nav-disabled",
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 1.2,
				spaceBetween: 30,
			},
			768: {
				slidesPerView: 3,
				spaceBetween: 20,
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 36,
			},
		},
		on: {
			init: function () {
				updateVacantesFraction(this);
			},
			slideChange: function () {
				updateVacantesFraction(this);
			},
		},
	});

	function updateVacantesFraction(swiper) {
		const currentIndex = swiper.realIndex + 1;
		const totalSlides = swiper.slides.length;
		const fractionHtml = `
			<span class="current">${currentIndex}</span>
			<span class="separator">/</span>
			<span class="total">${totalSlides}</span>
		`;
		document.querySelector(".swiper-fraction-vac").innerHTML = fractionHtml;
	}

	function initHeightVacantes() {
		if ($(".vacantesSwiper").length) {
			$(".vacantesSwiper .swiper-slide h3").height("auto");
			$(".vacantesSwiper .swiper-slide p + p").height("auto");

			let maxHeightVacantes = 0;
			let maxHeightVacantesP = 0;

			$(".vacantesSwiper .swiper-slide h3").each(function () {
				let height = $(this).height();
				maxHeightVacantes =
					height > maxHeightVacantes ? height : maxHeightVacantes;
			});
			$(".vacantesSwiper .swiper-slide h3").height(maxHeightVacantes);

			$(".vacantesSwiper .swiper-slide p + p").each(function () {
				let heightP = $(this).height();
				maxHeightVacantesP =
					heightP > maxHeightVacantesP ? heightP : maxHeightVacantesP;
			});
			$(".vacantesSwiper .swiper-slide p + p").height(maxHeightVacantesP);
		}
	}

	initHeightVacantes();

	let resizeTimer;
	$(window).on("resize", function () {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function () {
			initHeightVacantes();
			swiper.update();
		}, 250);
	});
};

export const initTabSedesSwiper = () => {
	let swipers = {};

	// Inicializar un swiper para cada tab
	document.querySelectorAll(".tab-pane").forEach((tabPane) => {
		const tabId = tabPane.id;
		const swiper = new Swiper(tabPane.querySelector(".tabSedesSwiper"), {
			modules: [Pagination, Navigation],
			slidesPerView: 1,
			spaceBetween: 10,
			centeredSlides: false,
			pagination: {
				el: tabPane.querySelector(".swiper-pagination-tab"),
				type: "bullets",
				clickable: true,
			},
			navigation: {
				disabledClass: "swiper-nav-disabled",
				nextEl: tabPane.querySelector(".swiper-button-next-tab"),
				prevEl: tabPane.querySelector(".swiper-button-prev-tab"),
				clickable: true,
			},
			on: {
				init: function () {
					updateTabSedesFraction(this, tabPane);
					updateNavigationState(this, tabPane);
				},
				slideChange: function () {
					updateTabSedesFraction(this, tabPane);
					updateNavigationState(this, tabPane);
				},
			},
		});

		swipers[tabId] = swiper;
	});

	function updateNavigationState(swiper, tabPane) {
		if (!tabPane.classList.contains("active")) return;

		const totalSlides = tabPane.querySelectorAll(".swiper-slide").length;
		const currentIndex = swiper.realIndex;

		// Actualizar estado de los botones
		const prevButton = tabPane.querySelector(".swiper-button-prev");
		const nextButton = tabPane.querySelector(".swiper-button-next");

		if (prevButton) {
			prevButton.classList.toggle("swiper-button-disabled", currentIndex === 0);
		}
		if (nextButton) {
			nextButton.classList.toggle(
				"swiper-button-disabled",
				currentIndex === totalSlides - 1
			);
		}
	}

	function updateTabSedesFraction(swiper, tabPane) {
		if (!tabPane.classList.contains("active")) return;

		const totalSlides = tabPane.querySelectorAll(".swiper-slide").length;
		const currentSlide = swiper.realIndex + 1;

		const fractionHtml = `
      <span class="current">${currentSlide}</span>
      <span class="separator">/</span>
      <span class="total">${totalSlides}</span>
    `;

		document.querySelector(".swiper-fraction-tab").innerHTML = fractionHtml;
	}

	// Manejar el cambio de tabs
	document
		.querySelectorAll('button[data-bs-toggle="tab"]')
		.forEach((button) => {
			button.addEventListener("shown.bs.tab", (event) => {
				const targetId = event.target
					.getAttribute("data-bs-target")
					.replace("#", "");
				const swiper = swipers[targetId];
				if (swiper) {
					swiper.update();
					updateTabSedesFraction(swiper, document.getElementById(targetId));
					updateNavigationState(swiper, document.getElementById(targetId));
				}
			});
		});
};
