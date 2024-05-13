# MQBreakpoints

**MQBreakpoints** is a lightweight, pure JavaScript library for responding to CSS media queries.

## Install

```
npm install --save mq-breakpoints
```

## Usage

#### JavaScript:
```js
// import MQBreakpoints
import MQBreakpoints from 'mq-breakpoints';
```
If you don't want to include **MQBreakpoints** files in your project, you can include it with a file
```html
<script src="/dist/mq-breakpoints.js"></script>
```

#### Usage:

```js
new MQBreakpoints("sm:min, lg:max", {
    // Preset grid for quick use
    grid: {
        sm: 576,
        md: 768,
        lg: 992,
        xl: 1200,
        xxl: 1400
    },

    // If set to true, triggered every time 
    // the screen changes its width/height
    listenerResize: false,
    
    // If set to true, defers execution of the setup function
    // until the first time the media query is matched
    deferSetup: false,
    
    // If supplied, triggered once, when the handler is registered.
    setup: () => {},
    
    // If supplied, triggered when a media query matches.
    match: () => {},
    
    // If supplied, triggered when a media query does not matches.
    unmatch: () => {}
})
```

#### Match

```js
new MQBreakpoints("(min-width: 1200px)", {
    match: () => {
        // Show HTML element
    }
})
```

#### Unmatch

```js
new MQBreakpoints("(min-width: 600px) and (max-width: 1000px)", {
    match: () => {
        // Show HTML element
    },
    unmatch: () => {
        // Hide HTML element
    }
})
```

#### Setup

```js
new MQBreakpoints("(max-width: 991px)", {
    setup: () => {
        // Example: Load in content via AJAX (just the once)
    },
    match: () => {
        // Show content
    },
    unmatch: () => {
        // Hide content
    }
})
```

#### Deferring Setup

```js
new MQBreakpoints("(min-width: 768px)", {
    deferSetup: true,
    setup: () => {
        // setup will be executed only when there is a match
        // Example: Load in content via AJAX (just the once)
    },
    match: () => {
        // Show content
    },
    unmatch: () => {
        // Hide content
    }
})
```
