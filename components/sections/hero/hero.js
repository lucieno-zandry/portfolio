const background = document.querySelector('.background-text');

window.addEventListener('scroll', () => {
    const y = window.scrollY;

    background.style.transform = `
        translate3d(0, ${y * 0.35}px, 0)
        scale(${1 + y * 0.0005})
    `;
});