export default class Modale {
  constructor(element) {
    this.element = element;

    this.medias = this.element.querySelectorAll('.has_modale');
    console.log(this.medias);

    this.init();
  }

  init() {}
}
