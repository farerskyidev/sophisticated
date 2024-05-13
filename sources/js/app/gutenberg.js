import {gsap} from "./gsap/gsap";
import {ScrollTrigger} from "./gsap/ScrollTrigger";
import {isjQuery} from "./functions";

gsap.registerPlugin(ScrollTrigger);

if (window.acf) {
    acf.add_filter('color_picker_args', function (args, field) {
        args.palettes = [
            '#1697F3',
            '#D5ECFD',
            '#8BC53F',
            '#253F53',
            '#FDC554',
            '#F3725F',
            '#FCF1E1'
        ]

        return args;
    })
}


const initializeBlock = block => {
    block = isjQuery(block)

    let elementDirectly = block.parentNode.querySelector('.CLASS-BLOCK')

}




if (window.acf) {
    window.acf.addAction('render_block_preview/type=TYPE-BLOCK', initializeBlock)
} else {
    document.querySelectorAll('.CLASS-BLOCK').forEach(initializeBlock)
}

if (window.acf) {
    window.acf.addAction('render_block_preview/type=main-page-header', initializeBlock)
} else {
    document.querySelectorAll('.main-page-header').forEach(initializeBlock)
}

if (window.acf) {
    window.acf.addAction('render_block_preview/type=horizontal-text-banner', initializeBlock)
} else {
    document.querySelectorAll('.horizontal-text-banner').forEach(initializeBlock)
}

if (window.acf) {
    window.acf.addAction('render_block_preview/type=prefooter-component', initializeBlock)
} else {
    document.querySelectorAll('.prefooter-component').forEach(initializeBlock)
}

if (window.acf) {
    window.acf.addAction('render_block_preview/type=secondary-page-header', initializeBlock)
} else {
    document.querySelectorAll('.secondary-page-header').forEach(initializeBlock)
}

if (window.acf) {
    window.acf.addAction('render_block_preview/type=service-solutions', initializeBlock)
} else {
    document.querySelectorAll('.service-solutions').forEach(initializeBlock)
}

if (window.acf) {
    window.acf.addAction('render_block_preview/type=vertical-steps', initializeBlock)
} else {
    document.querySelectorAll('.vertical-steps').forEach(initializeBlock)
}