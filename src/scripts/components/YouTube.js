/** Classe Youtube */

/**
 *@param {HTMLElement} element
 */

export default class YouTube {
  constructor(element) {
    this.element = element;

    this.youtubeContainer = this.element.querySelector('.js-video-youtube');
    this.poster = this.element.querySelector('.js-poster');
    this.youtubeId = this.element.dataset.youtubeId;
    this.autoplay = this.poster ? 1 : 0;
    this.playerReady = false;

    YouTube.instances.push(this);

    if (this.youtubeId) {
      YouTube.loadScript();
    } else {
      console.error('vous devez specifier un id');
    }
  }

  /**
   * Permet de loader le script pour faire fonctionner les paramètres de youtube
   */
  static loadScript() {
    if (!YouTube.scriptIsLoading) {
      YouTube.scriptIsLoading = true;
      const script = document.createElement('script');
      script.src = 'https://www.youtube.com/iframe_api';
      document.body.appendChild(script);
    }
  }

  /**
   * permet de rajouter l'evenement de click sur le poster/l'icone
   */
  init() {
    this.initPlayer = this.initPlayer.bind(this);

    document.documentElement.classList.add('is-video-ready');

    if (this.poster) {
      this.element.addEventListener('click', this.initPlayer);
    } else {
      this.initPlayer();
    }
  }

  /**
   * permet de retirer le poster/l'icone lorsque l'utilisateur clique dessus, démarre aussi l'autoplay
   * et d'arrêter les vidéos si on commence une nouvelle video ou descendons dans la page
   * @param {click} event - contiens l'evenement click du poster/icone de la video
   */
  initPlayer(event) {
    if (event) {
      this.element.removeEventListener('click', this.initPlayer); //retire l'evenement clique
    }

    this.player = new YT.Player(this.youtubeContainer, {
      height: '100%',
      width: '100%',
      videoId: this.youtubeId,
      playerVars: {
        rel: 0,
        autoplay: this.autoplay, //active l'autoplay
        controls: this.element.hasAttribute('data-no-controls') ? 0 : 1,
      },
      events: {
        onReady: () => {
          this.playerReady = true;
          const observer = new IntersectionObserver(this.watch.bind(this), {
            rootMargin: '0px 0px 0px 0px',
          });
          observer.observe(this.element); //on observe la video
        },
        onStateChange: (event) => {
          if (event.data == YT.PlayerState.PLAYING) {
            //Pause tous les videos SAUF ceux qui joue
            YouTube.pauseAll(this);
          } else if (event.data == YT.PlayerState.ENDED) {
            //remet la video a 0:00 et en pause si la video se finit
            this.player.seekTo(0);
            this.player.pauseVideo();
          }
        },
      },
    });
  }

  /**
   * method description
   * @param {event} entries - contient ce que l'observeur observe
   */
  watch(entries) {
    if (this.playerReady && !entries[0].isIntersecting) {
      //si l'objet observer sort de l'observeur
      this.player.pauseVideo(); //on pause la video
    }
  }

  /**
   * Creer toute les videos
   */
  static initAll() {
    for (let i = 0; i < YouTube.instances.length; i++) {
      const instance = YouTube.instances[i];
      instance.init();
    }
  }

  /**
   * Pause la(les) video en cours
   * @param {any} currentInstance - contiens les videos qui joues
   */
  static pauseAll(currentInstance) {
    for (let i = 0; i < YouTube.instances.length; i++) {
      const instance = YouTube.instances[i];
      if (instance.playerReady !== undefined && instance !== currentInstance) {
        instance.player.pauseVideo();
      }
    }
  }
}

YouTube.instances = [];
window.onYouTubeIframeAPIReady = YouTube.initAll;
