import $ from "jquery";
import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";

export const initServiciosSwiper = () => {
	const swiper = new Swiper(".serviciosSwiper", {
		modules: [Pagination],
		slidesPerView: "auto",
		spaceBetween: 36,
		centeredSlides: false,
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
		document.querySelector(".swiper-fraction-ser").innerHTML = fractionHtml;
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
		document.querySelector(".swiper-fraction-ser").innerHTML = fractionHtml;
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
		enabled: window.innerWidth < 1024, // Solo habilitado en móvil
		slidesPerView: 1,
		spaceBetween: 10,
		pagination: {
			el: ".swiper-pagination-tar",
			clickable: true,
		},
		navigation: {
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
				updateTarjetaTextFraction(this);
			},
			slideChange: function () {
				updateTarjetaTextFraction(this);
			},
		},
	});

	function updateTarjetaTextFraction(swiper) {
		const currentIndex = swiper.realIndex + 1;
		const totalSlides = swiper.slides.length;
		const fractionHtml = `
			<span class="current">${currentIndex}</span>
			<span class="separator">/</span>
			<span class="total">${totalSlides}</span>
		`;
		document.querySelector(".swiper-fraction-tar").innerHTML = fractionHtml;
	}

	// Habilitar/deshabilitar en resize
	window.addEventListener("resize", () => {
		swiper.enabled = window.innerWidth < 1024;
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
