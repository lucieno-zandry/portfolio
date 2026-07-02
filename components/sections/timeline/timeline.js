gsap.registerPlugin(MotionPathPlugin);
gsap.defaults({ ease: "none" });

// 1. Initialize the timeline base
const pulses = gsap.timeline({
    defaults: {
        duration: 0.05,
        autoAlpha: 1,
        scale: 2,
        transformOrigin: "center",
        ease: "elastic(2.5, 1)",
    },
});

// 2. Dynamically look up all anchor points and loop through them
const anchors = document.querySelectorAll(".anchor");

anchors.forEach((anchor, idx) => {
    // Calculates a clean incremental trigger point along the scroll duration
    const timePosition = 0.05 + idx * 0.13;

    // Group animations together effortlessly using the index
    pulses.to(`.ball-${idx}, .text-${idx}, .title-${idx}`, {}, timePosition);
});

// 3. Attach everything to the main ScrollTrigger container
const main = gsap
    .timeline({
        defaults: { duration: 1 },
        scrollTrigger: {
            trigger: "#svg-stage",
            scrub: true,
            start: "top center",
            end: "bottom center",
            markers: false,
        },
    })
    .to(".ball-main", { duration: 0.01, autoAlpha: 1 })
    .to(
        ".ball-main",
        {
            motionPath: {
                path: ".theLine",
                align: ".theLine",
                alignOrigin: [0.5, 0.5],
            },
        },
        0
    )
    .add(pulses, 0);

/* ------------------------------------------------------------------ */
/* Info popovers — data is injected by PHP as window.timelineCompanyInfo */
/* ------------------------------------------------------------------ */
function initInfoPopovers() {
    const container = document.querySelector(".timeline-container");
    const popover = document.getElementById("infoPopover");
    if (!container || !popover) return;

    const title = popover.querySelector(".info-popover-title");
    const text = popover.querySelector(".info-popover-text");
    const link = popover.querySelector(".info-popover-link");
    const closeBtn = popover.querySelector(".info-popover-close");

    let activeIcon = null;

    function openPopover(icon) {
        const idx = Number(icon.dataset.index);
        const data = window.timelineCompanyInfo && window.timelineCompanyInfo[idx];
        if (!data) return;

        title.textContent = data.name;
        text.textContent = data.info;
        link.href = data.url;
        link.textContent = data.actionLabel ?? "Visit website →";

        const iconRect = icon.getBoundingClientRect();
        const containerRect = container.getBoundingClientRect();

        popover.style.top = `${iconRect.top - containerRect.top + iconRect.height / 2}px`;
        popover.style.left = `${iconRect.left - containerRect.left + iconRect.width / 2}px`;

        const overflowsRight = iconRect.left + 260 > window.innerWidth;
        popover.classList.toggle("align-left", overflowsRight);

        popover.classList.add("is-open");
        popover.setAttribute("aria-hidden", "false");
        activeIcon = icon;
    }

    function closePopover() {
        popover.classList.remove("is-open");
        popover.setAttribute("aria-hidden", "true");
        activeIcon = null;
    }

    document.querySelectorAll(".info-icon").forEach((icon) => {
        icon.addEventListener("click", (e) => {
            e.stopPropagation();
            activeIcon === icon ? closePopover() : openPopover(icon);
        });
        icon.addEventListener("keydown", (e) => {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                activeIcon === icon ? closePopover() : openPopover(icon);
            }
        });
    });

    closeBtn.addEventListener("click", closePopover);
    document.addEventListener("click", (e) => {
        if (activeIcon && !popover.contains(e.target)) closePopover();
    });
    window.addEventListener("scroll", closePopover, { passive: true });
    window.addEventListener("resize", closePopover);
}

window.addEventListener("load", initInfoPopovers);