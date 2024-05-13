import MQBreakpoints from '../src/mq-breakpoints'

let mqTest = document.querySelector('.mq-test');

new MQBreakpoints('sm:min, lg:max', {
    listenerResize: true,
    grid: {
        sm: 576,
        md: 768,
        lg: 992,
        xl: 1200,
        xxl: 1400
    },
    deferSetup: true,
    setup: () => {
        mqTest.scrollTop = mqTest.scrollHeight
        mqTest.insertAdjacentHTML('beforeend', '<div>Setup</div>');
        console.log('setup')
    },
    match: () => {
        mqTest.scrollTop = mqTest.scrollHeight
        mqTest.insertAdjacentHTML('beforeend', '<div>Match</div>');
        console.log('match')
    },
    unmatch: () => {
        mqTest.scrollTop = mqTest.scrollHeight
        mqTest.insertAdjacentHTML('beforeend', '<div>UnMatch</div>');
        console.log('unmatch')
    }
})


let mqTestFls = document.querySelector('.mq-test-fls');

new MQBreakpoints('sm:min, lg:max', {
    grid: {
        sm: 576,
        md: 768,
        lg: 992,
        xl: 1200,
        xxl: 1400
    },
    setup: () => {
        mqTestFls.scrollTop = mqTestFls.scrollHeight
        mqTestFls.insertAdjacentHTML('beforeend', '<div>Setup</div>');
        console.log('setup')
    },
    match: () => {
        mqTestFls.scrollTop = mqTestFls.scrollHeight
        mqTestFls.insertAdjacentHTML('beforeend', '<div>Match</div>');
        console.log('match')
    },
    unmatch: () => {
        mqTestFls.scrollTop = mqTestFls.scrollHeight
        mqTestFls.insertAdjacentHTML('beforeend', '<div>UnMatch</div>');
        console.log('unmatch')
    }
})
