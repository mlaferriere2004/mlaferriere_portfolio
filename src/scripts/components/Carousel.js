import Swiper from 'swiper/bundle';

export default class Carousel {
  constructor(element) {
    this.element = element;
    this.options = {
      slidesPerView: 1,
      loop: false,
      pagination: {
        el: this.element.querySelector('.swiper-pagination'),
        type: 'bullets',
      },
      navigation: {
        nextEl: this.element.querySelector('.swiper-button-next'),
        prevEl: this.element.querySelector('.swiper-button-prev'),
      },
      spaceBetween: 0,
    };

    this.init();
  }

  init() {
    this.setOptions();
    console.log('Initialisation de ma composante Carousel');
    new Swiper(this.element, this.options);
  }

  setOptions() {
    const variant = this.element.dataset.variant;

    /* if ('slides' in this.element.dataset) {
      this.options.slidesPerView = parseInt(this.element.dataset.slides);
      console.log(this.element.dataset.slides);
    } */

    /* if (variant == 'split') {
      this.options.breakpoints = {
        768: {
          slidesPerView: this.options.slidesPerView + 0.5,
        },
      };
    } */

    if ('gap' in this.element.dataset) {
      this.options.spaceBetween = parseInt(this.element.dataset.gap + 'px');
      console.log(this.options.spaceBetween);
    }

    if (variant == 'split') {
      this.options.breakpoints = {
        768: {
          slidesPerView: 2.5,
        },
      };
    }

    if (variant == 'news') {
      this.options = {
        spaceBetween: 50,
        loop: true,
      };

      this.options.autoplay = {
        delay: 3500,
        pauseOnMouseEnter: true,
        disableOnInteraction: false,
      };

      this.options.breakpoints = {
        768: {
          slidesPerView: 2,
        },
      };
    }

    if ('autoplay' in this.element.dataset) {
      this.options.autoplay = {
        delay: 5000,
        pauseOnMouseEnter: true,
        disableOnInteraction: false,
      };
    }

    if ('loop' in this.element.dataset) {
      this.options.loop = true;
    }
  }
}
