export default class Scrolly {
  constructor(element) {
    this.element = element;

    this.options = {
      rootMargin: '0px 0px 0px 0px',
    };

    this.init();
  }

  init() {
    const observer = new IntersectionObserver(
      this.watch.bind(this),
      this.options
    );

    const items = document.querySelectorAll('[data-scrolly]');
    for (let i = 0; i < items.length; i++) {
      const item = items[i];
      //console.log(item);
      observer.observe(item);
    }
  }

  watch(entries, observer) {
    for (let i = 0; i < entries.length; i++) {
      const entry = entries[i];
      const target = entry.target;
      //console.log(target);

      if (entry.isIntersecting) {
        //console.log('yes');
        target.classList.add('is-active');
        if (target.hasAttribute('data-no-repeat')) {
          observer.unobserve(target);
          console.log('ca marche');
        }
      } else {
        //console.log('no');
        target.classList.remove('is-active');
      }
    }
  }
}
