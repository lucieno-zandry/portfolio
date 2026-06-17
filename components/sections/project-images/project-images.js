
(function () {
    'use strict';

    const wrapper = document.getElementById('gallery');
    if (!wrapper) return;

    const observer = new IntersectionObserver(
        (entries) => {
            for (const entry of entries) {
                if (entry.isIntersecting) {
                    wrapper.dataset.inViewport = 'true';
                    wrapper.classList.add('in-viewport');
                } else {
                    wrapper.dataset.inViewport = 'false';
                    wrapper.classList.remove('in-viewport');
                }
            }
        }, { threshold: 0 }
    );

    observer.observe(wrapper);
})();
