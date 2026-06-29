// Hardcoded configuration for the optimal cinematic blur effect
const config = {
    layers: 5,
    blur: 40,
    mask: 30, // Adjust this if you want the blur to start higher or lower
    padding: 50,
    saturate: 1, // Set to 1 so your personal photos keep their natural color
};

const blur = document.querySelector('.blur');

const initBlurEffect = () => {
    // Inject CSS variables to the root
    document.documentElement.style.setProperty('--layers', config.layers);
    document.documentElement.style.setProperty('--blur-max', config.blur);
    document.documentElement.style.setProperty('--mask-stop', config.mask);
    document.documentElement.style.setProperty('--padding', config.padding);
    document.documentElement.style.setProperty('--saturate', config.saturate);

    // Generate the stacking context for the advanced blur
    if (blur) {
        blur.innerHTML = new Array(config.layers)
            .fill()
            .map((_, index) => {
                return `<div style="--i: ${index + 1};"></div>`;
            })
            .join('');
    }
};

// Initialize on load
initBlurEffect();