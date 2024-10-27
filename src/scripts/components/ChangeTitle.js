export default class ChangeText {
  constructor() {
    this.originalTitle = document.title;

    this.messages = [
      '🐈 Part pas trop loin...',
      '⭐ Atteignons les étoiles! ⭐',
      '👨 Je suis juste ici!',
      '😔 Ben voyons...',
    ];

    this.Index = 0;
    this.titleTimeout = null;

    this.init();
  }

  init() {
    window.addEventListener('blur', () => this.startChange());
    window.addEventListener('focus', () => this.returnOriginal());
  }

  startChange() {
    this.titleTimeout = setTimeout(() => this.changeTitle(), 2000);
  }

  changeTitle() {
    if (!document.hasFocus()) {
      document.title = this.messages[this.Index];
      this.Index = Math.floor(Math.random() * this.messages.length);

      this.titleTimeout = setTimeout(() => {
        document.title = this.originalTitle;
        this.titleTimeout = setTimeout(() => this.changeTitle(), 2000);
      }, 2000);
    }
  }

  returnOriginal() {
    clearTimeout(this.titleTimeout);
    document.title = this.originalTitle;
    this.Index = 0;
  }
}
