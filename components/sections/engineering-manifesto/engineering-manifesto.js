const config = {
    theme: 'system',
    animate: true,
    debug: false,
    hue: 0,
    start: 50,
    space: 50,
}

const initManifestoEffect = () => {
    document.documentElement.dataset.theme = config.theme
    document.documentElement.dataset.animate = config.animate
    document.documentElement.dataset.debug = config.debug
    document.documentElement.style.setProperty('--hue', config.hue)
    document.documentElement.style.setProperty('--start', `${config.start}vh`)
    document.documentElement.style.setProperty('--space', `${config.space}vh`)
}

initManifestoEffect();