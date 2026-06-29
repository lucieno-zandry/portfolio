document.addEventListener("DOMContentLoaded", () => {
    const sections = document.querySelectorAll(".reveal");

    const observerOptions = {
        root: null,       // Defaults to the browser viewport
        rootMargin: "0px",
        threshold: 0.15   // Triggers when 15% of the section is visible
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            // Check if the section has entered the viewport
            if (entry.isIntersecting) {
                entry.target.classList.add("active");

                // Unobserve stops watching the element once it has revealed.
                // Remove this line if you want the effect to replay every time you scroll up/down.
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Tell the observer to watch each section
    sections.forEach(section => {
        observer.observe(section);
    });
});