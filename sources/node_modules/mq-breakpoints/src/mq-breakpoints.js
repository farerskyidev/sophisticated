import isNumeric from './helpers/isNumeric';

export default class MQBreakpoints {
    constructor(media, options) {
        this.defaults = {
            grid: {
                sm: 576,
                md: 768,
                lg: 992,
                xl: 1200,
                xxl: 1400
            },
            listenerResize: false,
            deferSetup: false
        };

        this.params = Object.assign(this.defaults, options);

        this.media = media;

        this.grid = {};
        Object.keys(this.params.grid).forEach((property) => {
            if (isNumeric(this.params.grid[property])) {
                this.grid[`${property}:min`] = this.params.grid[property];
                this.grid[`${property}:max`] = this.params.grid[property] - 1;
            } else {
                this.grid[property] = this.params.grid[property];
            }
        });

        this.mq = window.matchMedia(this.mediaQueryString());

        this.init();
    }

    mediaQueryString() {
        if (this.media.indexOf(':min') === -1 && this.media.indexOf(':max') === -1) {
            return this.media;
        }
        const mqArray = this.media.split(',');
        let mqString = '';
        if (mqArray.length) {
            let i = 1;
            mqArray.forEach((el) => {
                if (el.trim().indexOf(':min') !== -1) {
                    mqString += `(min-width: ${this.grid[el.trim()]}px)`;

                    if (i < mqArray.length) mqString += ' and ';
                } else if (el.trim().indexOf(':max') !== -1) {
                    mqString += `(max-width: ${this.grid[el.trim()]}px)`;

                    if (i < mqArray.length) mqString += ' and ';
                }

                i += 1;
            });
        }

        return mqString;
    }

    handleMatchMedia() {
        if (this.mq.matches) {
            if (this.params.match && typeof this.params.match === 'function') {
                this.params.match();
            }
        } else if (this.params.unmatch && typeof this.params.unmatch === 'function') {
            this.params.unmatch();
        }
    }

    setupInit() {
        if (this.params.setup && typeof this.params.setup === 'function') {
            this.params.setup();
        }
    }

    init() {
        if (this.params.deferSetup) {
            if (this.mq.matches) {
                this.setupInit();
            }
        } else {
            this.setupInit();
        }

        this.handleMatchMedia();

        if (this.params.listenerResize) {
            window.addEventListener('resize', () => {
                this.handleMatchMedia();
            });
        } else {
            this.mq.addEventListener('change', () => {
                this.handleMatchMedia();
            });
        }
    }
}
