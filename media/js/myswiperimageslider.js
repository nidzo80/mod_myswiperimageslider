document.addEventListener('DOMContentLoaded', function() {
    const swiperContainers = document.querySelectorAll('.mySwiperImageSlider');

    swiperContainers.forEach(swiperContainer => {
        // Preuzima konfiguraciju iz atributa podataka
        const slidesPerView = parseInt(swiperContainer.dataset.slidesPerView || 3, 10);
        const spaceBetween = parseInt(swiperContainer.dataset.spaceBetween || 30, 10);
        const autoplayEnabled = swiperContainer.dataset.autoplay === 'true';

        // Preuzima parametre veličine/uklapanja slike
        const imageWidth = swiperContainer.dataset.imageWidth;
        const imageHeight = swiperContainer.dataset.imageHeight;
        const objectFit = swiperContainer.dataset.objectFit;
		
		 // Preuzima parametre tranzicije
        const transitionSpeed = parseInt(swiperContainer.dataset.transitionSpeed || 300, 10);
        const transitionEffect = swiperContainer.dataset.transitionEffect || 'slide';

        // Podešavamo CSS prilagođena svojstva na kontejneru slajdera
        if (imageWidth) {
            swiperContainer.style.setProperty('--swiper-image-width', `${imageWidth}px`);
        }
        if (imageHeight) {
            swiperContainer.style.setProperty('--swiper-image-height', `${imageHeight}px`);
        }
        if (objectFit) {
            swiperContainer.style.setProperty('--swiper-object-fit', objectFit);
        }

        new Swiper(swiperContainer, {
            slidesPerView: slidesPerView,
            spaceBetween: spaceBetween,
            loop: true,
			speed: transitionSpeed, // Brzina prelaza
            effect: transitionEffect, // Efekat prelaza
            autoplay: autoplayEnabled ? {
                delay: 2500,
                disableOnInteraction: false,
            } : false,
            pagination: false,
            navigation: {
                nextEl: swiperContainer.querySelector('.swiper-button-next'),
                prevEl: swiperContainer.querySelector('.swiper-button-prev'),
            },
            breakpoints: {
                // VAŽNO: Prilagodite ove prekidne tačke ako podesite slides_per_view na 1 za mobilne uređaje,
// i možda želite da koristite različite veličine slika na mobilnim uređajima.
// Za sada, hajde da ih zadržimo koristeći glavna podešavanja, osim ako nisu posebno zamenjena.
                768: {
                    slidesPerView: slidesPerView,
                    spaceBetween: spaceBetween,
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                }
            }
        });
    });
});
