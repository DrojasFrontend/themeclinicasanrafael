import { Tabs } from "bootstrap";
import {} from  "./menu-init";
import {
	initServiciosSwiper,
	initNoticiasSwiper,
	initServiciosDestacadosSwiper,
	initHeroCaruselSwiper,
	initTarjetaTextoSwiper,
	initVacantesSwiper,
} from "./swiper-init";
import { initClickableCards } from "./card-click-init";
import {} from  "./especialidades-init";
import {} from  "./especialistas-init";
import {} from  "./servicios-init";
let Main = {
	init: async function () {
		document.addEventListener("DOMContentLoaded", () => {
			if (document.querySelector(".serviciosSwiper")) {
				initServiciosSwiper();
			}
			if (document.querySelector(".noticiasSwiper")) {
				initNoticiasSwiper();
			}
			if (document.querySelector(".serviciosDestacadosSwiper")) {
				initServiciosDestacadosSwiper();
			}
			if (document.querySelector(".heroCaruselSwiper")) {
				initHeroCaruselSwiper();
			}
			if (document.querySelector(".tarjetaTextoSwiper")) {
				initTarjetaTextoSwiper();
			}
			if (document.querySelector(".vacantesSwiper")) {
				initVacantesSwiper();
			}

			initClickableCards(".clickeable");

			const tabElements = document.querySelectorAll(
				'button[data-bs-toggle="tab"]'
			);
			const tabs = [...tabElements].map(
				(tabElement) => new bootstrap.Tab(tabElement)
			);
		});
	},
};
Main.init();
