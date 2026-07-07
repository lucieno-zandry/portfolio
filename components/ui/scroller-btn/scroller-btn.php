<button id="scrollToTopBtn" class="scroll-top-floating" aria-label="Scroll to top">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="18 15 12 9 6 15"></polyline>
    </svg>
</button>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const scrollTopBtn = document.getElementById('scrollToTopBtn');

        if (scrollTopBtn) {
            // 1. Show button when scrolling down, hide when close to top
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    scrollTopBtn.classList.add('visible');
                } else {
                    scrollTopBtn.classList.remove('visible');
                }
            });

            // 2. Smooth scroll back to top on click
            scrollTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    });
</script>