gsap.registerPlugin(MotionPathPlugin);
gsap.defaults({ ease: "none" });

const pulses = gsap
    .timeline({
        defaults: {
            duration: 0.05,
            autoAlpha: 1,
            scale: 2,
            transformOrigin: "center",
            ease: "elastic(2.5, 1)",
        },
    })
    .to(".ball01, .text00, .title-0", {}, 0.05)
    .to(".ball02, .text01, .title-1", {}, 0.2)
    .to(".ball03, .text02, .title-2", {}, 0.33)
    .to(".ball04, .text03, .title-3", {}, 0.46)
    .to(".ball05, .text04, .title-4", {}, 0.59)
    .to(".ball06, .text05, .title-5", {}, 0.72);

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
    .to(".ball00", { duration: 0.01, autoAlpha: 1 })
    .to(
        ".ball00",
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