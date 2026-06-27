(function () {
    'use strict';

    const wrapper = document.getElementById('gallery');
    if (!wrapper) return;

    const gridInner = wrapper.querySelector('.grid-inner');
    if (!gridInner) return;

    // Original Intersection Observer
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

    // --- Interactive Pan Logic (on grid-inner) ---
    let targetX = 0;
    let currentX = 0;
    const ease = 0.08;

    let startTouchX = 0;
    let initialPanX = 0;
    let isTouching = false;

    // Smooth animation loop
    function updatePan() {
        currentX += (targetX - currentX) * ease;

        if (wrapper.dataset.inViewport === 'true') {
            gridInner.style.setProperty('--pan-x', `${currentX.toFixed(2)}px`);
        }
        requestAnimationFrame(updatePan);
    }
    updatePan();

    // ── Compute max pan based on grid width ──
    // grid-inner is 160vw, so overflow is 30vw on each side.
    function getMaxPan() {
        // Dynamically calculate overflow: Grid Width minus Viewport Width
        const gridWidth = gridInner.getBoundingClientRect().width;
        const viewportWidth = window.innerWidth;
        const overflow = gridWidth - viewportWidth;

        // Pan distance is half the overflow on each side
        return overflow > 0 ? overflow / 2 : 0;
    }

    // 1. Desktop Mouse Movement
    window.addEventListener('mousemove', (e) => {
        if (isTouching) return;

        const rect = wrapper.getBoundingClientRect();
        if (rect.top <= 1) { // sticky active
            const center = window.innerWidth / 2;
            const offset = (e.clientX - center) / center;
            const maxPan = getMaxPan();
            targetX = -offset * maxPan;
        } else {
            targetX = 0;
        }
    });

    // 2. Mobile Touch Swiping
    window.addEventListener('touchstart', (e) => {
        isTouching = true;
        const rect = wrapper.getBoundingClientRect();
        if (rect.top <= 1) {
            startTouchX = e.touches[0].clientX;
            // Captures the current position so the next swipe starts smoothly from here
            initialPanX = currentX;
        }
    }, { passive: true });

    window.addEventListener('touchmove', (e) => {
        const rect = wrapper.getBoundingClientRect();
        if (rect.top <= 1) {
            const deltaX = e.touches[0].clientX - startTouchX;
            const maxPan = getMaxPan();
            const requestedPan = initialPanX + deltaX;
            targetX = Math.max(-maxPan, Math.min(maxPan, requestedPan));
        }
    }, { passive: true });

    window.addEventListener('touchend', () => {
        // REMOVED: targetX = 0; (This was causing the snap-back)

        // We still need to tell the script the touch has ended
        setTimeout(() => { isTouching = false; }, 100);
    });

    // Gently reset if mouse leaves the window (Desktop only)
    document.addEventListener('mouseleave', (e) => {
        // Match against pointerType to ensure touch screens don't trigger this
        if (!isTouching && e.pointerType === 'mouse') {
            targetX = 0;
        }
    });

    // Recalculate on resize
    window.addEventListener('resize', () => {
        const maxPan = getMaxPan();
        if (Math.abs(currentX) > maxPan) {
            targetX = Math.sign(currentX) * maxPan;
        }
    });

})();