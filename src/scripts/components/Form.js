export default class Form {
  /**
   *
   * @param {HTMLElement} element
   */

  constructor(element) {
    this.element = element;
    this.formElements = this.element.elements;

    this.init();
  }

  init() {
    this.element.setAttribute('novalidate', '');

    for (let i = 0; i < this.formElements.length; i++) {
      const input = this.formElements[i];

      if (input.required) {
        input.addEventListener('input', this.validateInput.bind(this));
      }
    }

    this.element.addEventListener('submit', this.onSubmit.bind(this));
  }

  onSubmit(event) {
    //event.preventDefault();

    //if (this.validate()) {
    //console.log('success');
    //envoie ajax du formulaire
    //this.showConfirmation();
    //} else {
    //console.log('fail');
    //}

    if (!this.validate()) {
      event.preventDefault();
      //console.log('fail');
    } else {
      //console.log('success');
    }
  }

  /**
   * method description
   * @return {boolean} - status de la validation
   */
  validate() {
    let isValid = true;
    console.log('validate');

    for (let i = 0; i < this.formElements.length; i++) {
      const input = this.formElements[i];

      if (input.required && !this.validateInput(input)) {
        isValid = false;
      }
    }
    return isValid;
  }

  validateInput(event) {
    const input = event.currentTarget || event;

    if (input.validity.valid) {
      console.log('success');
      this.removeError(input);
    } else {
      console.log('fail');
      this.addError(input);
    }
    return input.validity.valid;
  }

  addError(input) {
    const container =
      input.closest('[data-input-container]') || input.closest('.input');
    container.classList.add('error');
  }

  removeError(input) {
    const container =
      input.closest('[data-input-container]') || input.closest('.input');
    container.classList.remove('error');
  }

  showConfirmation() {
    this.element.classList.add('is-sent');
  }
}
