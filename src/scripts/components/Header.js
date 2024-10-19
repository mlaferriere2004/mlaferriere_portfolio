export default class Header {
  constructor(element) {
    this.element = element;
    this.scrollLimit = 0.1; //this is a percentage
    this.scrollPosition = 0;
    this.lastScrollPosition = 0;
    this.html = document.documentElement;

    this.init();
    this.initNavMobile();
  }

  init() {
    console.log('header');
    this.changeScrollLimit();

    window.addEventListener('scroll', this.onScroll.bind(this));
  }

  onScroll(event) {
    this.lastScrollPosition = this.scrollPosition;
    this.scrollPosition = document.scrollingElement.scrollTop;

    this.setHeaderState();
    this.setDirectionState();
  }

  setHeaderState() {
    const scrollHeight = document.scrollingElement.scrollHeight;

    if (this.element.classList.contains('header')) {
      if (!this.element.hasAttribute('data-not-hiding')) {
        if (this.scrollPosition > scrollHeight * this.scrollLimit) {
          this.html.classList.add('header-is-hidden');
        } else {
          this.html.classList.remove('header-is-hidden');
        }
      }
    }
  }

  setDirectionState() {
    if (this.scrollPosition >= this.lastScrollPosition) {
      this.html.classList.add('is-scrolling-down');
      this.html.classList.remove('is-scrolling-up');
    } else {
      this.html.classList.add('is-scrolling-up');
      this.html.classList.remove('is-scrolling-down');
    }
  }

  initNavMobile() {
    const toggleButton = this.element.querySelector('.js-button');
    const toggleItems = this.element.querySelectorAll('.js-item');

    toggleButton.addEventListener('click', this.onToggleNav.bind(this));

    for (let i = 0; i < toggleItems.length; i++) {
      const Item = toggleItems[i];
      Item.addEventListener('click', this.removeNav.bind(this));
    }
  }

  onToggleNav() {
    this.html.classList.toggle('nav-is-active');
  }

  removeNav() {
    this.html.classList.remove('nav-is-active');
  }

  changeScrollLimit() {
    if (this.element.hasAttribute('data-scroll-limit')) {
      this.scrollLimit = parseFloat(this.element.dataset.scrollLimit);
      console.log(this.scrollLimit);
    }
  }
}
