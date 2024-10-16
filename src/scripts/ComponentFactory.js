import Scrolly from './components/Scrolly';
import Carousel from './components/Carousel';
import Header from './components/Header';
import YouTube from './components/YouTube';
import Form from './components/Form';
//import Accordeon from './components/Accordeon';
import ChangeText from './components/ChangeText';
import Modale from './components/Modale';

export default class ComponentFactory {
  constructor() {
    this.componentList = {
      Scrolly,
      Carousel,
      Header,
      YouTube,
      Form,
      //Accordeon,
      ChangeText,
      Modale,
    };
    this.init();
  }
  init() {
    const components = document.querySelectorAll('[data-component]');

    for (let i = 0; i < components.length; i++) {
      const element = components[i];
      const componentName = element.dataset.component;

      if (this.componentList[componentName]) {
        new this.componentList[componentName](element);
      } else {
        console.log(`La composante ${componentName} n'existe pas`);
      }
    }
  }
}
