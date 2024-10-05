export default class ChangeText {
  constructor(element) {
    this.element = element;

    this.text_interaction = this.element.querySelectorAll('.text'); //select the element with the "text" class
    this.img = this.element.querySelectorAll('.illustration'); //select the img element with the "illustration" class
    this.images = [
      '/assets/images/game.png',
      '/assets/images/music.png',
      '/assets/images/art.png',
      '/assets/images/explore.png',
    ]; //stores all the illustrations' srcs. Done manually since only one .text element exists.
    this.state = 0;
    this.texts = this.element.dataset.texts
      .split(', ')
      .map((text) => text.trim());
    this.init();

    console.log(this.img);
  }

  init() {
    console.log(this.texts.length);
    this.setInteraction();
    //this.updateText();
  }

  //sets the click event for the element with the .text class
  setInteraction() {
    for (let i = 0; i < this.text_interaction.length; i++) {
      const element = this.text_interaction[i];
      element.addEventListener('click', this.updateState.bind(this));
    }
  }

  updateState() {
    if (this.state < this.texts.length - 1) {
      this.state = this.state + 1;
    } else {
      this.state = 0;
    }

    this.updateImg();
  }

  updateImg() {
    this.img[0].src = this.images[this.state];
  }
}
