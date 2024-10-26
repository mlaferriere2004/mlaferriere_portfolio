export default class Modale {
  constructor(element) {
    this.element = element;

    this.medias = this.element.querySelectorAll('.has_modale');
    this.modale = document.querySelector('.modale');
    this.modaleMediaContainer = this.modale.querySelector('.modale_media');

    this.init();
  }

  init() {
    this.applyEvents();
  }

  applyEvents() {
    //apply event to modale
    this.modale.addEventListener('click', this.closeModale.bind(this));

    //apply click events to medias
    for (let i = 0; i < this.medias.length; i++) {
      const element = this.medias[i];
      element.addEventListener('click', this.openModale.bind(this));
    }
  }

  openModale(event) {
    const mediaClone = event.target.cloneNode(true);

    mediaClone.style.cursor = 'pointer';

    this.modaleMediaContainer.innerHTML = '';

    this.modaleMediaContainer.appendChild(mediaClone);

    this.modale.classList.toggle('modale_active');
  }

  closeModale() {
    this.modale.classList.toggle('modale_active');

    this.modaleMediaContainer.innerHTML = '';
  }
}
